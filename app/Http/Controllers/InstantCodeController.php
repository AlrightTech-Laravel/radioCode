<?php

namespace App\Http\Controllers;

use App\Models\Manufacturer;
use App\Models\RadioSerialNumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\IOFactory;

class InstantCodeController extends Controller {
    public function index() {
        $data = [
            'manufacturers' => RadioSerialNumber::groupBy('target')->get(),
        ];

        return view('instant-code.index', $data);
    }

    public function show($target) {
        $data = [
            'manufacturer' => RadioSerialNumber::where('target', $target)->paginate(100),
        ];

        return view('instant-code.show', $data);
    }

    public function create() {
        $data = [
            'manufacturers' => Manufacturer::orderBy('title')->get(),
        ];
        return view('instant-code.create', $data);
    }

    public function store(Request $request) {
        $request->validate([
            'serial' => ['required'],
            'target' => ['required'],
            'radio_code' => ['required'],
        ]);

        $radio_serial = RadioSerialNumber::create([
            'target' => $request->target,
            'serial_number' => $request->serial,
            'radio_code' => $request->radio_code,
        ]);

        if ($radio_serial) {
            return redirect()->route('admin.instant-code.index')->withSuccessMessage('A new radio code has been added to the manufacturer <strong>' . ucfirst($radio_serial->target) . '</strong>.');
        }
        return redirect()->back(302, [], route('admin.instant-code.create'))->withInput($request->all())->withErrorMessage('An error occurred while trying to create an instant code. Please try again.');
    }

    public function destroy($id) {
        $deleted = RadioSerialNumber::where('id', $id)->delete();
        if ($deleted) {
            return redirect()->route('admin.instant-code.index')->withSuccessMessage('The instant code with serial number has been deleted successfully.');
        }
        return redirect()->back(302, [], route('admin.instant-code.show', $instant_code->manufacturer))->withErrorMessage('An error occurred while trying to delete an instant code. Please try again.');
    }
    public function createNewRadioSerial() {
        return view('instant-code.create');
    }
    public function uploadNewRadioSerial() {
        return view('instant-code.upload');
    }
    public function storeNewRadioSerial(Request $request) {
        $request->validate([
            'serial_number' => ['required'],
            'target' => ['required'],
            'radio_code' => ['required'],
        ]);

        $exsiting_radio_serial = RadioSerialNumber::where('target', $request->target)->first();
        if ($exsiting_radio_serial) {
            return redirect()->back(302, [], route('admin.instant-code.create'))->withInput($request->all())->withErrorMessage('Target Already Existed');
        } else {
            $radio_serial = RadioSerialNumber::create([
                'target' => $request->target,
                'serial_number' => $request->serial_number,
                'radio_code' => $request->radio_code,
            ]);
            if ($radio_serial) {
                return redirect()->route('admin.instant-code.index')->withSuccessMessage('A new radio code has been added to the manufacturer <strong>' . ucfirst($radio_serial->target) . '</strong>.');
            } else {
                return redirect()->back(302, [], route('admin.instant-code.create'))->withInput($request->all())->withErrorMessage('An error occurred while trying to create an instant code. Please try again.');
            }
        }
    }
    public function uploadStoreNewRadioSerial(Request $request) {
        $request->validate([
            'target' => ['required'],
            'excel' => ['required'],
        ]);
        $exsiting_radio_serial = RadioSerialNumber::where('target', $request->target)->first();
        if ($exsiting_radio_serial) {
            return redirect()->back(302, [], route('admin.instant-code.create'))->withInput($request->all())->withErrorMessage('Target Already Existed');
        } else {
            if (!empty($_FILES)) {
                ini_set('memory_limit', '50000M');
                ini_set('max_execution_time', 4800); //600 seconds = 10 minutes

                // $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($request->excel);

                $file_type = \PhpOffice\PhpSpreadsheet\IOFactory::identify($request->excel);
                $objReader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($file_type);
                $objPHPExcel = $objReader->load($request->excel);
                $sheet_data = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);

                foreach ($sheet_data as $data) {
                    if (!empty($data['A'])) {
                        $array = array(
                            'target' => strtolower($request->target),
                            'serial_number' => strtoupper($data['A']),
                            'radio_code' => $data['B'],
                        );
                        DB::table('radio_serial_numbers')->insert($array);
                    }
                }
                return redirect()->route('admin.instant-code.index')->withSuccessMessage('Radio Codes has been added');
            }
        }
    }
}
