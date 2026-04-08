/**
 * Front-end JavaScript
 *
 * The JavaScript code you place here will be processed by esbuild. The output
 * file will be created at `../theme/js/script.min.js` and enqueued in
 * `../theme/functions.php`.
 *
 * For esbuild documentation, please see:
 * https://esbuild.github.io/
 */


 
  (function () {

   function openModal(id) {
  const modal = document.getElementById(id);
  if (!modal) return;

  // Restore src from data-src for any iframe
  modal.querySelectorAll('iframe').forEach(iframe => {
    if (iframe.dataset.src) iframe.src = iframe.dataset.src;
  });

  modal.classList.remove('hidden');
  modal.classList.add('flex');
  document.body.classList.add('modal-open');

  const firstFocusable = modal.querySelector(
    'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])'
  );
  if (firstFocusable) firstFocusable.focus();
}

    function closeModal(id) {
  const modal = document.getElementById(id);
  if (!modal) return;

  modal.querySelectorAll('video, audio').forEach(el => el.pause());

  // Clears src on close — works for YouTube, Vimeo, any iframe embed
  modal.querySelectorAll('iframe').forEach(iframe => {
    iframe.dataset.src = iframe.dataset.src || iframe.src; // save it first
    iframe.src = '';
  });

  modal.classList.add('hidden');
  modal.classList.remove('flex');

  if (!document.querySelector('.modal.flex')) {
    document.body.classList.remove('modal-open');
  }
}

    // data-modal-open="modal-id"  →  opens that modal
    // data-modal-close="modal-id" →  closes that modal
    document.addEventListener('click', function (e) {
      const opener = e.target.closest('[data-modal-open]');
      if (opener) {
        openModal(opener.dataset.modalOpen);
        return;
      }

      const closer = e.target.closest('[data-modal-close]');
      if (closer) {
        closeModal(closer.dataset.modalClose);
        return;
      }

      // Click on backdrop closes the modal
      const backdrop = e.target.closest('.modal-backdrop');
      if (backdrop) {
        const modal = backdrop.closest('.modal');
        if (modal) closeModal(modal.id);
      }
    });

    // Escape key
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape') {
        document.querySelectorAll('.modal.flex').forEach(m => closeModal(m.id));
      }
    });

    // Focus trap
    document.addEventListener('keydown', function (e) {
      if (e.key !== 'Tab') return;
      const open = document.querySelector('.modal.flex');
      if (!open) return;

      const focusable = open.querySelectorAll(
        'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])'
      );
      const first = focusable[0];
      const last = focusable[focusable.length - 1];

      if (e.shiftKey) {
        if (document.activeElement === first) { e.preventDefault(); last.focus(); }
      } else {
        if (document.activeElement === last) { e.preventDefault(); first.focus(); }
      }
    });

  })();