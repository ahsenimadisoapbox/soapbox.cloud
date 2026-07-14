@extends('layouts.backend')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0">Media Library</h4>
        <a href="{{ route('admin.media.create') }}" class="btn btn-success">
            Upload New
        </a>
    </div>

    <div class="row">
        @foreach($media as $item)
            <div class="col-md-3 mb-4">
                <div class="card shadow-sm h-100">

                    <!-- Clickable Image -->
                    <img 
                        src="{{ asset($item->path) }}" 
                        class="card-img-top open-media"
                        style="height:200px; object-fit:cover; cursor:pointer;"
                        data-image="{{ asset($item->path) }}"
                        data-title="{{ $item->title }}"
                        data-alt="{{ $item->alt }}"
                        data-path="{{ asset($item->path) }}"
                    >


                    <div class="card-body text-center">
                        <h6 class="mb-1 text-truncate">
                            {{ $item->title }}
                        </h6>

                        <small class="text-muted text-truncate d-block mb-2">
                            {{ $item->alt }}
                        </small>
                        @if($item->redirect_url)
                            <small class="d-block mt-2">
                                <strong>Link:</strong>
                                <a href="{{ $item->redirect_url }}"
                                target="_blank">
                                    View URL
                                </a>
                            </small>
                        @endif
                        <form action="{{ route('admin.media.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this media?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</div>
<div id="mediaModal" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5>Media Details</h5>
                <button class="btn btn-sm btn-danger" onclick="closeMediaModal()">X</button>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <img id="modalImage" class="img-fluid w-100 mb-3">
                </div>
                <div class="col-md-4">
                    <p><strong>Title:</strong> <span id="modalTitle"></span></p>
                    <p><strong>Alt:</strong> <span id="modalAlt"></span></p>
                    <div class="mb-3">
                        <label class="fw-bold mb-1">Image Path</label>
                        <div class="copy-wrapper">
                            <input type="text" id="modalPath" readonly>
                            <button type="button" onclick="copyPath()">Copy</button>
                        </div>

                        <small id="copyMessage"></small>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection
@push('styles')
<style>

/* ===== FORCE MODAL FULLSCREEN OVERLAY ===== */

#mediaModal {
    position: fixed !important;
    top: 0 !important;
    left: 0 !important;
    width: 100vw !important;
    height: 100vh !important;
    display: none;
    align-items: center;
    justify-content: center;
    background: rgba(0, 0, 0, 0.7) !important;
    z-index: 999999 !important;
}

/* When modal is active */
#mediaModal.show {
    display: flex !important;
}

/* Modal dialog */
#mediaModal .modal-dialog {
    width: 80%;
    max-width: 1200px;
    margin: 0;
}

/* Modal content */
#mediaModal .modal-content {
    background: #ffffff;
    border-radius: 12px;
    padding: 20px;
    max-height: 90vh;
    overflow-y: auto;
    overflow-x: hidden;
}

/* Remove default fade animation */
#mediaModal.fade .modal-dialog {
    transform: none !important;
}

/* Fix backdrop if Bootstrap adds one */
.modal-backdrop {
    display: none !important;
}

.copy-wrapper {
    display: flex;
    gap: 8px;
}

.copy-wrapper input {
    flex: 1;
    padding: 8px 10px;
    border-radius: 6px;
    border: 1px solid #ccc;
    background: #f8f9fa;
    font-size: 14px;
}

.copy-wrapper button {
    padding: 8px 14px;
    border: none;
    border-radius: 6px;
    background: #0d6efd;
    color: white;
    cursor: pointer;
    transition: 0.2s;
}

.copy-wrapper button:hover {
    background: #084298;
}

#copyMessage {
    color: green;
    font-size: 13px;
    display: block;
    margin-top: 5px;
}


</style>
@endpush
@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", function() {

    const modal = document.getElementById('mediaModal');
    const modalContent = modal.querySelector('.modal-content');

    document.querySelectorAll('.open-media').forEach(function(img) {

        img.addEventListener('click', function() {

            document.getElementById('modalImage').src = this.dataset.image || '';
            document.getElementById('modalTitle').innerText = this.dataset.title || '';
            document.getElementById('modalAlt').innerText = this.dataset.alt || '';
            document.getElementById('modalPath').value = this.dataset.path || '';

            modal.classList.add('show');
        });

    });

    // ✅ Close when clicking outside modal-content
    modal.addEventListener('click', function(e) {
        if (!modalContent.contains(e.target)) {
            closeMediaModal();
        }
    });

    // ✅ Close on ESC key
    document.addEventListener('keydown', function(e) {
        if (e.key === "Escape") {
            closeMediaModal();
        }
    });

});

function closeMediaModal() {
    document.getElementById('mediaModal').classList.remove('show');
}

function copyPath() {
    const input = document.getElementById("modalPath");
    const message = document.getElementById("copyMessage");

    if (!input.value) return;

    navigator.clipboard.writeText(input.value).then(() => {
        message.innerText = "Copied to clipboard!";
        setTimeout(() => {
            message.innerText = "";
        }, 2000);
    });
}
</script>
@endpush
