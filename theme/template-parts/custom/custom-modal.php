<div id="modal-video" role="dialog" aria-modal="true" aria-labelledby="modal-video-title"
    class="modal fixed inset-0 z-50 hidden items-center justify-center p-4">
    <div class="modal-backdrop absolute inset-0 bg-black/70 backdrop-blur-sm" data-modal-close="modal-video"></div>
    <div class="modal-panel relative bg-white rounded-2xl shadow-2xl w-full max-w-4xl mx-auto">
        <div class="flex items-center justify-end">
            <button data-modal-close="modal-video" aria-label="Close modal"
                class="w-16 h-16 flex items-center justify-center rounded-full text-primary hover:text-gray-200 transition hover:cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <div class="px-5">
            <iframe class="modal-iframe w-full rounded-xl border-0"
                data-src="https://player.vimeo.com/video/1016484029?dnt=1&app_id=122963" width="1280" height="550"
                frameborder="0"
                allow="autoplay; fullscreen; picture-in-picture; clipboard-write; encrypted-media; web-share"
                referrerpolicy="strict-origin-when-cross-origin">
            </iframe>
        </div>
    </div>
</div>