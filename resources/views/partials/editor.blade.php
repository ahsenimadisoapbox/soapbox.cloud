@props([
    'name',
    'id',
    'value' => '',
    'required' => false
])

@php
    $editorId = $id ?? 'editor_' . uniqid();
@endphp

<div class="editor-wrapper">

    <div class="editor-toolbar">

        <!-- Headings -->
        <select class="formatBlock" data-target="{{ $editorId }}" title="Headings">
            <option value="p">Paragraph</option>
            <option value="h1">H1</option>
            <option value="h2">H2</option>
            <option value="h3">H3</option>
            <option value="h4">H4</option>
            <option value="h5">H5</option>
            <option value="h6">H6</option>
        </select>

        <!-- Font -->
        <select class="fontName" data-target="{{ $editorId }}" title="Font Name">
            <option value="Arial">Arial</option>
            <option value="Verdana">Verdana</option>
            <option value="Times New Roman">Times</option>
            <option value="Courier New">Courier</option>
        </select>

        <select class="fontSize" data-target="{{ $editorId }}" title="Font Size">
            <option value="2">Small</option>
            <option value="3" selected>Normal</option>
            <option value="4">Medium</option>
            <option value="5">Large</option>
            <option value="6">X-Large</option>
        </select>

        <input type="color" class="foreColor" data-target="{{ $editorId }}" title="Text Color">
        <input type="color" class="backColor" data-target="{{ $editorId }}" title="Background Color">

        <button type="button" class="execCmd" data-command="bold" data-target="{{ $editorId }}" title="Bold"><i class="fa fa-bold"></i></button>
        <button type="button" class="execCmd" data-command="italic" data-target="{{ $editorId }}" title="Italic"><i class="fa fa-italic"></i></button>
        <button type="button" class="execCmd" data-command="underline" data-target="{{ $editorId }}" title="Underline"><i class="fa fa-underline"></i></button>
        <button type="button" class="execCmd" data-command="strikeThrough" data-target="{{ $editorId }}" title="Strikethrough"><i class="fa fa-strikethrough"></i></button>

        <button type="button" class="execCmd" data-command="justifyLeft" data-target="{{ $editorId }}" title="Justify Left"><i class="fa fa-align-left"></i></button>
        <button type="button" class="execCmd" data-command="justifyCenter" data-target="{{ $editorId }}" title="Justify Center"><i class="fa fa-align-center"></i></button>
        <button type="button" class="execCmd" data-command="justifyRight" data-target="{{ $editorId }}" title="Justify Right"><i class="fa fa-align-right"></i></button>

        <button type="button" class="execCmd" data-command="insertUnorderedList" data-target="{{ $editorId }}" title="Unordered List"><i class="fa fa-list-ul"></i></button>
        <button type="button" class="execCmd" data-command="insertOrderedList" data-target="{{ $editorId }}" title="Ordered List"><i class="fa fa-list-ol"></i></button>

        <button type="button" class="insertLink" data-target="{{ $editorId }}" title="Insert Link"><i class="fa fa-link"></i></button>
        <button type="button" class="insertTable" data-target="{{ $editorId }}" title="Insert Table"><i class="fa fa-table"></i></button>
        <button type="button" class="insertImage" data-target="{{ $editorId }}" title="Insert Image"><i class="fa fa-image"></i></button>
        <button type="button" class="insertVideo" data-target="{{ $editorId }}" title="Insert Video"><i class="fa fa-video"></i></button>

        <select class="insertColumns" data-target="{{ $editorId }}">
            <option value="">Columns</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
        </select>

        <button type="button" class="toggleCode" data-target="{{ $editorId }}"><i class="fa fa-code"></i></button>

    </div>

    <div id="{{ $editorId }}"
        contenteditable="true"
        class="editor-area"
        spellcheck="false"
        autocorrect="off"
        autocomplete="off"
        autocapitalize="off"
        data-gramm="false"
        data-gramm_editor="false"
        data-enable-grammarly="false">
        {!! $value !!}
    </div>

    <input type="hidden"
           name="{{ $name }}"
           id="{{ $editorId }}_input"
           @if($required) required @endif>

</div>
