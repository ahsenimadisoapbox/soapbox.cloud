<script>
document.addEventListener('DOMContentLoaded', function () {

    function dynamicRepeater(config) {

        let index = document.querySelectorAll(
            config.wrapper + ' .row'
        ).length;

        document.addEventListener('click', function (e) {

            // ADD
            if (e.target.classList.contains(config.addBtn)) {

                let html = config.template(index);

                document
                    .querySelector(config.wrapper)
                    .insertAdjacentHTML(
                        'beforeend',
                        html
                    );

                index++;
            }

            // REMOVE
            if (e.target.classList.contains(config.removeBtn)) {

                e.target.closest('.row').remove();

            }

        });

    }

    /*
    |--------------------------------------------------------------------------
    | What EHS AI Assist Helps With
    |--------------------------------------------------------------------------
    */

    dynamicRepeater({

        wrapper: '#help_item-wrapper',

        addBtn: 'add-help_item',

        removeBtn: 'remove-help_item',

        template: (i) => `
            <div class="row mb-2">

                <div class="col-md-3">
                    <input
                        type="text"
                        name="help_items[${i}][icon]"
                        class="form-control"
                        placeholder="Icon">
                </div>

                <div class="col-md-3">
                    <input
                        type="text"
                        name="help_items[${i}][name]"
                        class="form-control"
                        placeholder="Name">
                </div>

                <div class="col-md-5">
                    <input
                        type="text"
                        name="help_items[${i}][description]"
                        class="form-control"
                        placeholder="Description">
                </div>

                <div class="col-md-1 text-end">
                    <button
                        type="button"
                        class="btn btn-danger remove-help_item">
                        X
                    </button>
                </div>

            </div>
        `
    });

    /*
    |--------------------------------------------------------------------------
    | Trust Points
    |--------------------------------------------------------------------------
    */

    dynamicRepeater({

        wrapper: '#trust_point-wrapper',

        addBtn: 'add-trust_point',

        removeBtn: 'remove-trust_point',

        template: (i) => `
            <div class="row mb-2">

                <div class="col-md-11">

                    <input
                        type="text"
                        name="trust_points[${i}][name]"
                        class="form-control"
                        placeholder="Trust Point">

                </div>

                <div class="col-md-1 text-end">

                    <button
                        type="button"
                        class="btn btn-danger remove-trust_point">

                        X

                    </button>

                </div>

            </div>
        `
    });

    /*
    |--------------------------------------------------------------------------
    | Business Outcomes
    |--------------------------------------------------------------------------
    */

    dynamicRepeater({

        wrapper: '#business_outcome-wrapper',

        addBtn: 'add-business_outcome',

        removeBtn: 'remove-business_outcome',

        template: (i) => `
            <div class="row mb-2">

                <div class="col-md-3">
                    <input
                        type="text"
                        name="business_outcomes[${i}][icon]"
                        class="form-control"
                        placeholder="Icon">
                </div>

                <div class="col-md-3">
                    <input
                        type="text"
                        name="business_outcomes[${i}][name]"
                        class="form-control"
                        placeholder="Name">
                </div>

                <div class="col-md-5">
                    <input
                        type="text"
                        name="business_outcomes[${i}][description]"
                        class="form-control"
                        placeholder="Description">
                </div>

                <div class="col-md-1 text-end">
                    <button
                        type="button"
                        class="btn btn-danger remove-business_outcome">
                        X
                    </button>
                </div>

            </div>
        `
    });

});
</script>