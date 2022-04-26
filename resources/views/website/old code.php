@if($each->required_fields)
    @foreach($each->required_fields as $field)
    @php
        $label = \App\Models\Manufacturer::$requiredFields[$field];
    @endphp
    <span class="input">
        <label class="input-label" data-content="Enter {{ $label }}" for="radio-serial">
            <span class="input-label-content">*Enter {{ $label }}</span>
        </label>
        <input placeholder="BP538971317615" data-type-get="serial-1" class="input-field i getElem radio-serial" name="{{ $field }}" id="{{ $field }}" required="" type="text" required="">
    </span>
    @endforeach
@endif

<form
    role="form"
    class="checkStripe"
    action="{{ route('radio-code-order.place-order' ,$manufacturer[0]) }}" id="detail_page_form" autocomplete="off">
    <input
        type="hidden"
        name="cmd"
        value="_xclick"
    >
    <input
        type="hidden"
        name="business"
        value="help@onlineradiocodes.co.uk"
    >
    <legend>
        <h4>
            <i class="fa fa-unlock-alt"></i> Simple Steps Process to Unlock Your
            <strong>{{$manufacturer[0]->brand->name}}o Radio</strong>...
        </h4>
    </legend>
    <div class="prod-delivery-time">
        <i
            class="fa fa-clock-o"
            aria-hidden="true"
        ></i>
        <span>Estimated Delivery Time: </span>
        <b id="time-val"></b>
    </div>
    <div class="buy-box-wrap four">
            <div class="box-wrap code">
            <label
                class="dib"
                for="Entering Code"
            >1. Enter your serial:
                <span class="orc-orange">*</span>
            </label>
            <input
                type="hidden"
                name="on0"
                value="Serial"
            >
            <input
                name="serial_number"
                type="text"
                class="radio-serial getElem"
                placeholder="Enter Serial or Vehicle manufacturer e.g. M123456"
                required=""
            >
            @error('serail_number')
                <div class="text-danger text-xsmall">{{ $message }}</div>
            @enderror
        </div>
        <div class="box-wrap">
            <label
                class="dib"
                for="Buy Button"
            >3. Upload Image.</label>
            <a
                class="buyCode"
                type="button"
                href="{{ route('radio-code-order.place-order', $manufacturer[0]) }}"
            >
                <i class="fa fa-arrow-right"></i> Upload Image
            </a>
        </div>
        <div class="box-wrap buy">
            <label
                class="dib"
                for="Buy Button"
            >3. Emailed within minutes.</label>
            <button
                class="buyCode"
                type="submit"
                id="submit-visit"
            >
                <i class="fa fa-arrow-right"></i> Radio Code
            </button>
        </div>
        </form>
    </div>
</form>