<div id="loader"></div>
<!-- Parallax Container -->
<div id="container" class="parallax-container snow">
    <!-- <ul id="christmas_scene" class="christmas-scene">

        <li class="layer" data-depth="0.80">
            <div class="layer-5 layer-photo photo-zoom"></div>
        </li>
        <li class="layer" data-depth="0.60">
            <div class="layer-4 layer-photo photo-zoom"></div>
        </li>
        <li class="layer" data-depth="0.40">
            <div class="layer-3 layer-photo photo-zoom"></div>
        </li>
        <li class="layer" data-depth="0.20">
            <div class="layer-2 layer-photo photo-zoom"></div>
        </li>
        <li class="layer" data-depth="0.00">
            <div class="layer-1 layer-photo"></div>
        </li>
    </ul> -->
    <!-- Countdown Container -->
    <div id="countdown_container"></div>

    <!-- Merry Christmas Text -> You can replace with anything you like! -->
    <div class="merry-christmas-text">Merry Christmas</div>

    {{-- <!-- Happy new year 2017 photo -->
    <div class="happy-new-year"></div> --}}

    <!-- Contact Pole Image -> From here the E-mail modal is triggered -->
    <!-- <div id="mail_pole">
        <img src="/template/client/countdown/images/pole.png" class="img-responsive" alt="mail-pole" data-toggle="modal"
            data-target="#contact_modal">
    </div> -->
    <!-- Christmas Tree -->
    <!-- <img src="/template/client/countdown/images/christmas-tree.png" alt="christmas-tree" id="christmas_tree" /> -->

    <!-- Social Media Icons Container -->

</div>

<!-- Send E-mail Modal -->
<div class="modal fade" id="contact_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="col-md-12 mail-container">
                    <div class="col-md-12 padding-none bg-color">
                        <div class="col-md-12 text-center">It's Christmas!</div>
                        <div class="col-md-12 text-center">Don't be shy, Send us a message!</div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <form class="col-md-12 padding-none">
                            <div class="col-md-6 col-xs-12">
                                <div class="col-md-12 padding-none">
                                    <input type="text" class="mail-first-name" id="form_first_name"
                                        placeholder="First Name" />
                                </div>
                                <div class="col-md-12 padding-none">
                                    <input type="text" class="mail-last-name" id="form_last_name"
                                        placeholder="Last Name" />
                                </div>
                                <div class="col-md-12 padding-none">
                                    <input type="text" class="mail-email" id="form_valid_email"
                                        placeholder="E-mail" />
                                </div>
                                <div class="col-md-12 padding-none">
                                    <textarea class="mail-message" id="form_message" placeholder="Message"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12 text-right">
                                <img src="/template/client/countdown/images/form-image.png" alt="form-pattern-image">
                                <button class="btn form-submit-button" type="submit" id="submit_form_btn">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-12 padding-none mail-container hidden">
                    <div class="col-md-12 padding-none bg-color thank-you-msg text-large" id="form_success_msg"></div>
                </div>
            </div>
        </div>
    </div>
</div>
