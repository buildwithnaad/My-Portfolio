<!-- Portfolio Images -->
<section class="flex justify-center flex-col items-center my-[100px]">
    <h2 class="sub-heading font-bold text-center text-[#FF4141]">My Portfolio</h2>

    <div class="card-container w-full flex justify-center items-stretch flex-wrap">
        @php
            $images = ['p1.png', 'p2.png', 'p3.png', 'p4.png', 'p5.png', 'project1.png'];
        @endphp

        @foreach ($images as $index => $image)
            <div class="portfolio-image-container p-3">
                <div
                    class="group relative overflow-hidden rounded-[8px] my-3 shadow-md transition-all duration-300 hover:shadow-xl">
                    <img src="{{ asset('assets/images/' . $image) }}" alt="Project Image {{ $index + 1 }}"
                        class="w-full h-[250px] object-cover rounded-[8px] transition-transform duration-500 group-hover:scale-105 cursor-pointer"
                        onclick="openModal({{ $index }})" />
                </div>
            </div>
        @endforeach
    </div>
</section>

<!-- Fullscreen Modal -->
<div id="imageModal"
    class="fixed inset-0 z-50 hidden bg-black/90 backdrop-blur-sm flex items-center justify-center flex-col">
    <!-- Close Button -->
    <button onclick="closeModal()" class="fixed top-4 right-4 text-white text-3xl z-50">&times;</button>

    <!-- Navigation Buttons -->
    <button onclick="prevImage()"
        class="fixed left-4 top-1/2 transform -translate-y-1/2 text-white text-2xl z-50 bg-black/50 p-2 rounded-full hover:bg-black">&larr;</button>
    <button onclick="nextImage()"
        class="fixed right-4 top-1/2 transform -translate-y-1/2 text-white text-2xl z-50 bg-black/50 p-2 rounded-full hover:bg-black">&rarr;</button>

    <!-- Image Viewer -->
    <div class="w-[90%] max-w-5xl overflow-y-auto max-h-screen mt-[60px] mb-[30px]">
        <img id="modalImage" src="" alt="Preview" class="w-full h-auto rounded-lg shadow-lg mx-auto">
    </div>
</div>

<script>
    const imagePaths = [
        "{{ asset('assets/images/p1.png') }}",
        "{{ asset('assets/images/p2.png') }}",
        "{{ asset('assets/images/p3.png') }}",
        "{{ asset('assets/images/p4.png') }}",
        "{{ asset('assets/images/p5.png') }}",
        "{{ asset('assets/images/project1.png') }}"
    ];

    let currentIndex = 0;

    function openModal(index) {
        currentIndex = index;
        const modal = document.getElementById("imageModal");
        const modalImage = document.getElementById("modalImage");
        modalImage.src = imagePaths[currentIndex];
        modal.classList.remove("hidden");
        document.body.style.overflow = "hidden"; // Prevent background scroll
    }

    function closeModal() {
        const modal = document.getElementById("imageModal");
        modal.classList.add("hidden");
        document.getElementById("modalImage").src = "";
        document.body.style.overflow = "auto";
    }

    function nextImage() {
        currentIndex = (currentIndex + 1) % imagePaths.length;
        document.getElementById("modalImage").src = imagePaths[currentIndex];
    }

    function prevImage() {
        currentIndex = (currentIndex - 1 + imagePaths.length) % imagePaths.length;
        document.getElementById("modalImage").src = imagePaths[currentIndex];
    }

    // Optional: Use keyboard arrows
    document.addEventListener("keydown", function (e) {
        if (document.getElementById("imageModal").classList.contains("hidden")) return;

        if (e.key === "ArrowRight") nextImage();
        if (e.key === "ArrowLeft") prevImage();
        if (e.key === "Escape") closeModal();
    });
</script>
