document.addEventListener('DOMContentLoaded', () => {

    document.querySelectorAll('.editor-area').forEach(editor => {
        editor.setAttribute('spellcheck', 'false');
        editor.setAttribute('data-gramm', 'false');
        editor.setAttribute('data-gramm_editor', 'false');
        editor.setAttribute('data-enable-grammarly', 'false');
    });

    const getEditor = (id) => document.getElementById(id);

    const exec = (editor, cmd, value = null) => {
        editor.focus();
        document.execCommand(cmd, false, value);
    };

    /* CLICK HANDLER */
    document.addEventListener('click', (e) => {

        const btn = e.target.closest('[data-target]');
        if (!btn) return;

        const editor = getEditor(btn.dataset.target);
        if (!editor) return;

        /* COMMAND BUTTONS */
        if (btn.classList.contains('execCmd')) {
            exec(editor, btn.dataset.command);
        }

        /* LINK */
        if (btn.classList.contains('insertLink')) {
            const url = prompt("Enter URL:");
            if (url) exec(editor, 'createLink', url);
        }

        /* TABLE */
        if (btn.classList.contains('insertTable')) {
            const rows = parseInt(prompt("Rows?", 2));
            const cols = parseInt(prompt("Columns?", 2));
            if (!rows || !cols) return;

            let table = "<table><tbody>";
            for (let r = 0; r < rows; r++) {
                table += "<tr>";
                for (let c = 0; c < cols; c++) table += "<td>Cell</td>";
                table += "</tr>";
            }
            table += "</tbody></table>";

            exec(editor, 'insertHTML', table);
        }

        /* IMAGE */
        if (btn.classList.contains('insertImage')) {
            const url = prompt("Image URL:");
            if (!url) return;

            exec(editor, 'insertHTML', `
                    <div class="media-wrapper">
                        <img src="${url}">
                        <div class="resize-handle"></div>
                    </div>
                `);
        }

        /* VIDEO */
        if (btn.classList.contains('insertVideo')) {
            const url = prompt("YouTube URL:");
            if (!url) return;

            let videoId = '';
            const match = url.match(/(?:youtu\.be\/|watch\?v=)([^&]+)/);
            if (match) videoId = match[1];

            if (!videoId) {
                alert("Invalid YouTube URL");
                return;
            }

            exec(editor, 'insertHTML', `
                    <div class="media-wrapper video-wrapper" style="width:400px;">
                        <div class="video-inner">
                            <iframe src="https://www.youtube.com/embed/${videoId}" frameborder="0" allowfullscreen></iframe>
                        </div>
                        <div class="resize-handle"></div>
                    </div>
                `);
        }


        /* CODE VIEW */
        if (btn.classList.contains('toggleCode')) {
            editor.dataset.code = editor.dataset.code === 'true' ? 'false' : 'true';
            editor.innerHTML = editor.dataset.code === 'true'
                ? editor.textContent
                : editor.innerHTML;
        }
    });

    /* CHANGE HANDLER */
    document.addEventListener('change', (e) => {

        const editor = getEditor(e.target.dataset?.target);
        if (!editor) return;

        if (e.target.classList.contains('formatBlock'))
            exec(editor, 'formatBlock', e.target.value);

        if (e.target.classList.contains('fontName'))
            exec(editor, 'fontName', e.target.value);

        if (e.target.classList.contains('fontSize'))
            exec(editor, 'fontSize', e.target.value);

        if (e.target.classList.contains('foreColor'))
            exec(editor, 'foreColor', e.target.value);

        if (e.target.classList.contains('backColor'))
            exec(editor, 'hiliteColor', e.target.value);

        if (e.target.classList.contains('insertColumns')) {
            const count = parseInt(e.target.value);
            if (!count) return;

            let html = `<div class="editor-columns">`;
            for (let i = 1; i <= count; i++)
                html += `<div class="editor-column" contenteditable="true">Column ${i}</div>`;
            html += `</div>`;

            exec(editor, 'insertHTML', html);
            e.target.value = '';
        }
    });

    /* IMAGE RESIZE */
    let activeWrapper = null, startX = 0, startWidth = 0;

    document.addEventListener('mousedown', e => {
        if (!e.target.classList.contains('resize-handle')) return;
        activeWrapper = e.target.parentElement;
        startX = e.pageX;
        startWidth = activeWrapper.offsetWidth;

        document.addEventListener('mousemove', resize);
        document.addEventListener('mouseup', stopResize);
    });

    const resize = (e) => {
        if (!activeWrapper) return;
        const newWidth = startWidth + (e.pageX - startX);
        if (newWidth > 100) activeWrapper.style.width = newWidth + "px";
    };

    const stopResize = () => {
        document.removeEventListener('mousemove', resize);
        document.removeEventListener('mouseup', stopResize);
        activeWrapper = null;
    };

    /* SELECT IMAGE */
    document.addEventListener('click', e => {
        document.querySelectorAll('.media-wrapper')
            .forEach(el => el.classList.remove('selected'));

        const wrapper = e.target.closest('.media-wrapper');
        if (wrapper) wrapper.classList.add('selected');
    });

    /* SUBMIT SYNC */
    document.addEventListener('submit', () => {
        document.querySelectorAll('.editor-area').forEach(editor => {
            const hidden = document.getElementById(editor.id + '_input');
            if (hidden) hidden.value = editor.innerHTML;
        });
    });

    document.querySelectorAll('.editor-toolbar *').forEach(el => el.tabIndex = -1);
});