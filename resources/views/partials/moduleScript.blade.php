<script>
document.addEventListener('DOMContentLoaded', function () {

    function dynamicRepeater(config) {

        let index = document.querySelectorAll(config.wrapper + ' .row').length;

        document.addEventListener('click', function (e) {

            // ADD
            if (e.target.classList.contains(config.addBtn)) {

                let html = config.template(index);
                document.querySelector(config.wrapper).insertAdjacentHTML('beforeend', html);
                index++;
            }

            // REMOVE
            if (e.target.classList.contains(config.removeBtn)) {
                e.target.closest('.row').remove();
            }

        });
    }

    // 🔹 Challengers
    dynamicRepeater({
        wrapper: '#challenger-wrapper',
        addBtn: 'add-challenger',
        removeBtn: 'remove-challenger',
        template: (i) => `
            <div class="row mb-2">
                <div class="col-md-5">
                    <input type="text" name="challengers[${i}][name]" class="form-control" placeholder="Name">
                </div>
                <div class="col-md-6">
                    <input type="text" name="challengers[${i}][description]" class="form-control" placeholder="Description">
                </div>
                <div class="col-md-1 text-end">
                    <button type="button" class="btn btn-danger remove-challenger">X</button>
                </div>
            </div>
        `
    });

    // 🔹 Solutions
    dynamicRepeater({
        wrapper: '#solution-wrapper',
        addBtn: 'add-solution',
        removeBtn: 'remove-solution',
        template: (i) => `
            <div class="row mb-2">
                <div class="col-md-3">
                    <input type="text" name="solutions[${i}][name]" class="form-control" placeholder="Name">
                </div>
                <div class="col-md-5">
                    <input type="text" name="solutions[${i}][description]" class="form-control" placeholder="Description">
                </div>
                <div class="col-md-3">
                    <input type="file" name="solutions[${i}][image]" class="form-control">
                </div>
                <div class="col-md-1 text-end">
                    <button type="button" class="btn btn-danger remove-solution">X</button>
                </div>
            </div>
        `
    });

    // 🔹 Key Capabilities
    dynamicRepeater({
        wrapper: '#key_capabilitie-wrapper',
        addBtn: 'add-key_capabilitie',
        removeBtn: 'remove-key_capabilitie',
        template: (i) => `
            <div class="row mb-2">
                <div class="col-md-5">
                    <input type="text" name="key_capabilities[${i}][name]" class="form-control" placeholder="Name">
                </div>
                <div class="col-md-6">
                    <input type="text" name="key_capabilities[${i}][description]" class="form-control" placeholder="Description">
                </div>
                <div class="col-md-1 text-end">
                    <button type="button" class="btn btn-danger remove-key_capabilitie">X</button>
                </div>
            </div>
        `
    });

    // 🔹 Uses
    dynamicRepeater({
        wrapper: '#uses-wrapper',
        addBtn: 'add-uses',
        removeBtn: 'remove-uses',
        template: (i) => `
            <div class="row mb-2">
                <div class="col-md-5">
                    <input type="text" name="uses[${i}][name]" class="form-control" placeholder="Name">
                </div>
                <div class="col-md-6">
                    <input type="text" name="uses[${i}][description]" class="form-control" placeholder="Description">
                </div>
                <div class="col-md-1 text-end">
                    <button type="button" class="btn btn-danger remove-uses">X</button>
                </div>
            </div>
        `
    });

    // 🔹 Measurables
    dynamicRepeater({
        wrapper: '#measurable-wrapper',
        addBtn: 'add-measurable',
        removeBtn: 'remove-measurable',
        template: (i) => `
            <div class="row mb-2">
                <div class="col-md-5">
                    <input type="text" name="measurables[${i}][name]" class="form-control" placeholder="Name">
                </div>
                <div class="col-md-6">
                    <input type="text" name="measurables[${i}][description]" class="form-control" placeholder="Description">
                </div>
                <div class="col-md-1 text-end">
                    <button type="button" class="btn btn-danger remove-measurable">X</button>
                </div>
            </div>
        `
    });

    // 🔹 Frameworks
    dynamicRepeater({
        wrapper: '#framework-wrapper',
        addBtn: 'add-framework',
        removeBtn: 'remove-framework',
        template: (i) => `
            <div class="row mb-2">
                <div class="col-md-11">
                    <input type="text" name="frameworks[${i}][name]" class="form-control" placeholder="Framework Name">
                </div>
                <div class="col-md-1 text-end">
                    <button type="button" class="btn btn-danger remove-framework">X</button>
                </div>
            </div>
        `
    });

});
</script>