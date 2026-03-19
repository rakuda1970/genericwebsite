{{--
    partials/footer.blade.php
    Site-wide footer — modelled on the Ariel Premium footer structure.
--}}
<footer class="site-footer">

    {{-- ── Top section: social + nav columns ─────────────────────────────── --}}
    <div class="footer-top">
        <div class="container-fluid px-4">
            <div class="footer-top-inner">

                {{-- Social --}}
                <div class="footer-social">
                    <p class="footer-social__label">Join us on Social Media:</p>
                    <div class="footer-social__icons">
                        <a href="#" aria-label="Facebook" class="footer-social__link">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>
                        <a href="#" aria-label="Instagram" class="footer-social__link">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                        <a href="#" aria-label="LinkedIn" class="footer-social__link">
                            <i class="fa-brands fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>

                {{-- Nav columns --}}
                <nav class="footer-nav" aria-label="Footer navigation">

                    <div class="footer-nav__col">
                        <h6 class="footer-nav__heading">Services</h6>
                        <ul>
                            <li><a href="#">General Info</a></li>
                            <li><a href="#">Imprinting Info</a></li>
                            <li><a href="#">Art Standards</a></li>
                            <li><a href="#">Stock Imprint Colors</a></li>
                            <li><a href="#">Stock Art</a></li>
                            <li><a href="#">Programs</a></li>
                        </ul>
                    </div>

                    <div class="footer-nav__col">
                        <h6 class="footer-nav__heading">Help</h6>
                        <ul>
                            <li><a href="#">My Account</a></li>
                            <li><a href="#">Credit Application</a></li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                    </div>

                    <div class="footer-nav__col">
                        <h6 class="footer-nav__heading">Tools</h6>
                        <ul>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Brand-In-A-Box</a></li>
                            <li><a href="#">Catalogs &amp; Lookbooks</a></li>
                            <li><a href="#">Flyers</a></li>
                            <li><a href="#">Information Center</a></li>
                            <li><a href="#">Photo Library</a></li>
                            <li><a href="#">Videos</a></li>
                        </ul>
                    </div>

                    <div class="footer-nav__col">
                        <h6 class="footer-nav__heading">Our Company</h6>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Careers</a></li>
                        </ul>
                    </div>

                    <div class="footer-nav__col">
                        <h6 class="footer-nav__heading">Info &amp; Policies</h6>
                        <ul>
                            <li><a href="#">Media</a></li>
                            <li><a href="#">Product Safety</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Human Rights Policy</a></li>
                        </ul>
                    </div>

                </nav>
            </div>
        </div>
    </div>

    {{-- ── Bottom section: logo + certifications + copyright ─────────────── --}}
    <div class="footer-bottom">
        <div class="container-fluid px-4">
            <div class="footer-bottom-inner">

                {{-- Logo --}}
                <div class="footer-logo">
                    <span class="footer-logo__text">{{ config('app.name') }}</span>
                    <small class="footer-logo__copy">&copy; {{ date('Y') }} {{ config('app.name') }}</small>
                </div>

                {{-- Certification badges --}}
                <div class="footer-badges">
                    {{-- Confirmed image badges from arielpremium.com/New_Layout_files/ --}}
                    <a href="https://fsc.org/en/about-us" target="_blank" rel="noopener" class="footer-badge-img-link">
                        <img src="https://www.arielpremium.com/New_Layout_files/fb_fsc.png"
                             alt="FSC Certified" class="footer-badge-img">
                    </a>
                    <a href="https://www.rainforesttrust.org/" target="_blank" rel="noopener" class="footer-badge-img-link">
                        <img src="https://www.arielpremium.com/New_Layout_files/fb_rainforest.png"
                             alt="Conservation Club Member" class="footer-badge-img">
                    </a>
                    <a href="#" target="_blank" rel="noopener" class="footer-badge-img-link">
                        <img src="https://www.arielpremium.com/New_Layout_files/fb_product-safety.png"
                             alt="Product Safety Ambassador" class="footer-badge-img">
                    </a>
                    <a href="https://nmsdc.org/learn-and-grow/" target="_blank" rel="noopener" class="footer-badge-img-link">
                        <img src="https://www.arielpremium.com/New_Layout_files/fb_nmsdc.png"
                             alt="NMSDC Certified" class="footer-badge-img">
                    </a>
                    <a href="https://www.ppai.org/media/ppai-100/suppliers/" target="_blank" rel="noopener" class="footer-badge-img-link">
                        <img src="https://www.arielpremium.com/New_Layout_files/fb_ppai.png"
                             alt="PPAI 100" class="footer-badge-img">
                    </a>
                    <a href="https://members.asicentral.com/news/strategy/july-2025/counselor-top-40-suppliers-2025/" target="_blank" rel="noopener" class="footer-badge-img-link">
                        <img src="https://www.arielpremium.com/New_Layout_files/fb_counselor.png"
                             alt="Counselor Top 40" class="footer-badge-img">
                    </a>
                    <a href="https://www.arielconcertseries.com/" target="_blank" rel="noopener" class="footer-badge-img-link">
                        <img src="https://www.arielpremium.com/New_Layout_files/fb_acs.png"
                             alt="Ariel Concert Series" class="footer-badge-img">
                    </a>
                    <a href="https://recognition.ecovadis.com/u18NFVa7OUShUIpVAHI7wg" target="_blank" rel="noopener" class="footer-badge-img-link">
                        <img src="https://www.arielpremium.com/New_Layout_files/fb_ecovsadis_new.png"
                             alt="EcoVadis Committed" class="footer-badge-img">
                    </a>
                </div>

            </div>
        </div>
    </div>

</footer>
