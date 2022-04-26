<x-website-layout>
    <x-slot name="pageTitle">Home | {{ config('app.name') }}</x-slot>
    <section class="hero">
        <div class="container">
            <form action="" class="search-form">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center">
                            <div class="title">
                                <h2>Unlock Your Radio Code in Minutes</h2>
                            </div>
                            <label for="searchQuery">Enter Serial or Vehicle Manufacturer.</label>
                            <div class="input-field">
                                <input type="text" class="form-control"
                                    placeholder="Enter serial or vehicle manufacturer e.g. M123456, Ford, Vauxhalli"
                                    id="searchQuery" name="search_query">
                            </div>
                            <div class="button-section mt-4">
                                <a href="{{ route('manufacturers') }}" class="btn btn-outline-primary">Full List</a>
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <main>

        <!-- ======= work-Section ======= -->

        <div class="work-section py-5">
            <div class="container">
                <div class="main text-center">
                    <h2>How Does This Work</h2>
                </div>
                <div class="row" style="margin-top: 70px;">
                    <div class="col-lg-4 col-md-6 col-12">
                        <h4 class="heading"><span>1</span> Find Your Serial</h4>
                        <div class="img-section">
                            <img src="{{ asset('img/how-to-1.png') }}" width="100%" alt="">
                        </div>
                        <p class="description">Find and provide your radio serial code (how-to instructions
                            provided on vehicle pages).
                        </p>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <h4 class="heading"><span>2</span> Enter Your Details</h4>
                        <div class="img-section">
                            <img src="{{ asset('img/how-to-2.png') }}" width="100%" alt="">
                        </div>
                        <p class="description">Enter your radio serial and email address in the order form then
                            proceed to secure
                            checkout.
                        </p>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <h4 class="heading"><span>3</span> Get Unlock Code</h4>
                        <div class="img-section">
                            <img src="{{ asset('img/how-to-3.png') }}" width="100%" alt="">
                        </div>
                        <p class="description">Most unlock codes are displayed instantly or within 10 minutes
                            after checkout.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- ======= about-section ======= -->
        <div class="about-section py-5" id="aboutUs">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="title">About Us!</h2>
                        <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut et dapibus
                            luctus ac morbi ac
                            odio hac
                            eget.
                            Libero amet nam hendrerit aliquam nisi. Ultrices magna ac bibendum porttitor felis,
                            tristique varius.
                            Tellus hendrerit scelerisque cursus volutpat habitant nulla eget metus, id.<br>

                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut et dapibus luctus ac morbi
                            ac odio hac eget.
                            Libero amet nam hendrerit aliquam nisi. Ultrices magna ac bibendum porttitor felis,
                            tristique varius.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut et dapibus luctus ac morbi
                            ac odio hac eget.
                            Libero amet nam hendrerit aliquam nisi. Ultrices magna ac bibendum porttitor felis,
                            tristique varius.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- ======= faq-section ======= -->
        <section class="accordion-section clearfix mt-3" aria-label="Question Accordions">
            <div class="container">

                <h2 class="section-heading">Frequently Asked Questions </h2>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading p-3 mb-3" role="tab" id="heading0">
                            <h3 class="panel-title">
                                <a class="collapsed" role="button" title="" data-toggle="collapse"
                                    data-parent="#accordion" href="#collapse0" aria-expanded="true"
                                    aria-controls="collapse0">
                                    How Long Does Code Delivery Take?
                                </a>
                            </h3>
                        </div>
                        <div id="collapse0" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading0">
                            <div class="panel-body px-3 mb-4">
                                <p>Most codes are available instantly, however if your code isn’t available straight away it will be emailed within 10 minutes. </p>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading p-3 mb-3" role="tab" id="heading1">
                            <h3 class="panel-title">
                                <a class="collapsed" role="button" title="" data-toggle="collapse"
                                    data-parent="#accordion" href="#collapse1" aria-expanded="true"
                                    aria-controls="collapse1">
                                    What Information is Required?
                                </a>
                            </h3>
                        </div>
                        <div id="collapse1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading1">
                            <div class="panel-body px-3 mb-4">
                                <p>We can writer papers in any format and that all depends of your format of choice. Whether its APA, MLA, Chicago, Harvard, OSCOLA etc, we’ve got you covered.</p>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading p-3 mb-3" role="tab" id="heading2">
                            <h3 class="panel-title">
                                <a class="collapsed" role="button" title="" data-toggle="collapse"
                                    data-parent="#accordion" href="#collapse2" aria-expanded="true"
                                    aria-controls="collapse2">
                                    Can You Unlock Radio's Without Serial?
                                </a>
                            </h3>
                        </div>
                        <div id="collapse2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading2">
                            <div class="panel-body px-3 mb-4">
                                <p>Our order delivery is very efficient. However tight the deadline is, we always deliver orders earlier than the deadline to give you enough time to go through the paper and make corrections if any. </p>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading p-3 mb-3" role="tab" id="heading3">
                            <h3 class="panel-title">
                                <a class="collapsed" role="button" title="" data-toggle="collapse"
                                    data-parent="#accordion" href="#collapse3" aria-expanded="true"
                                    aria-controls="collapse3">
                                    What If the Code Does Not Work?
                                </a>
                            </h3>
                        </div>
                        <div id="collapse3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading3">
                            <div class="panel-body px-3 mb-4">
                                <p>Once the paper is completed, we will notify you by email and/or SMS. You can download the final paper from your account under the order details section of the order. From there, you can mark the paper as complete and leave a review and in case of any corrections needed, you can send the paper back for revision. </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </main>
</x-website-layout>
