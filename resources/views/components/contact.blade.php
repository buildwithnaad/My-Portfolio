<section>
    <!-- Left: Form -->
    <div class='mt-3'>
        <h2 class="sub-heading font-bold text-[#FF4141] text-center mb-8">Contact Me</h2>
        <div class="flex justify-center flex-wrap items-stretch  text-white">
            <form class=" contact-form p-5">
                <!-- Name -->
                <div class='mt-3'>
                    <label class="form-label" for="name">Name*</label>
                    <input type="text" id="name" class="form-input px-3 py-2 mb3 mt-1" placeholder="Your Name"
                        required />
                </div>

                <!-- Email -->
                <div class='mt-3'>
                    <label class="form-label" for="email">Email*</label>
                    <input type="email" id="email" class="form-input px-3 py-2 mb3 mt-1" placeholder="Your Email"
                        required />
                </div>

                <!-- Subject -->
                <div class='mt-3'>
                    <label class="form-label" for="subject">Subject</label>
                    <input type="text" id="subject" class="form-input px-3 py-2 mb-3 mt-1" placeholder="Subject" />
                </div>

                <!-- Message -->
                <div class='mt-3'>
                    <label class="form-label" for="message">Message</label>
                    <textarea id="message" rows="3" class="form-input px-3 py-2 mb-3 mt-1" placeholder="Your Message" style="resize:none;"></textarea>
                </div>

                <!-- Submit Button -->
                <div class="mt-6 flex justify-center">
                    <button
                        class="text-white contact-form-btn bg-[#FF4141] hover:bg-[#FF4141] font-semibold px-5 py-3 rounded-xl shadow-md transition-all duration-300 ease-in-out">
                        Send Message
                    </button>
                </div>
            </form>

            <!-- Right: Contact Info -->
            <div class="flex justify-center items-center contact-second-part p-5">
                <div class="flex justify-center items-center flex-col contact-second-part-inner gap-[20px] py-[50px]">

                    <h3 class="contact-subheading font-semibold">Get in Touch with me</h3>
                    <div class="flex items-center gap-3 contact-info-item">
                        <i class="fab fa-whatsapp "></i>
                        <span>+0300 79351400</span>
                    </div>
                    <div class="flex items-center gap-3 contact-info-item">
                        <i class="fas fa-envelope "></i>
                        <span>naadalijutt@gmail.com</span>
                    </div>
                </div>
            </div>
        </div>
</section>
