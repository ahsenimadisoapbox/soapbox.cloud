<script>

document.addEventListener('DOMContentLoaded', function () {

    function dynamicRepeater(config) {

        let index =
            document.querySelectorAll(
                config.wrapper + ' .row'
            ).length;

        document.addEventListener('click', function (e) {

            if (
                e.target.classList.contains(
                    config.addBtn
                )
            ) {

                let html =
                    config.template(index);

                document
                    .querySelector(config.wrapper)
                    .insertAdjacentHTML(
                        'beforeend',
                        html
                    );

                index++;
            }

            if (
                e.target.classList.contains(
                    config.removeBtn
                )
            ) {

                e.target
                    .closest('.row')
                    .remove();
            }

        });
    }

    /*
    |--------------------------------------------------------------------------
    | Operations
    |--------------------------------------------------------------------------
    */

    dynamicRepeater({

        wrapper: '#operation-wrapper',

        addBtn: 'add-operation',

        removeBtn: 'remove-operation',

        template: (i) => `

            <div class="row mb-2">

                <div class="col-md-5">

                    <input
                        type="text"
                        name="operations[${i}][name]"
                        class="form-control"
                        placeholder="Operation">

                </div>

                <div class="col-md-6">

                    <input
                        type="text"
                        name="operations[${i}][description]"
                        class="form-control"
                        placeholder="Description">

                </div>

                <div class="col-md-1 text-end">

                    <button
                        type="button"
                        class="btn btn-danger remove-operation">

                        X

                    </button>

                </div>

            </div>

        `
    });

    /*
    |--------------------------------------------------------------------------
    | Regulations
    |--------------------------------------------------------------------------
    */

    dynamicRepeater({

        wrapper: '#regulation-wrapper',

        addBtn: 'add-regulation',

        removeBtn: 'remove-regulation',

        template: (i) => `

            <div class="row mb-2">

                <div class="col-md-5">

                    <input
                        type="text"
                        name="regulations[${i}][name]"
                        class="form-control"
                        placeholder="Regulation">

                </div>

                <div class="col-md-6">

                    <input
                        type="text"
                        name="regulations[${i}][description]"
                        class="form-control"
                        placeholder="Description">

                </div>

                <div class="col-md-1 text-end">

                    <button
                        type="button"
                        class="btn btn-danger remove-regulation">

                        X

                    </button>

                </div>

            </div>

        `
    });

    /*
    |--------------------------------------------------------------------------
    | Scaling Silo Trap
    |--------------------------------------------------------------------------
    */

    dynamicRepeater({

        wrapper: '#silo-wrapper',

        addBtn: 'add-silo',

        removeBtn: 'remove-silo',

        template: (i) => `

            <div class="row mb-2">

                <div class="col-md-5">

                    <input
                        type="text"
                        name="scaling_silo_trap[${i}][title]"
                        class="form-control"
                        placeholder="Title">

                </div>

                <div class="col-md-5">

                    <select
                        name="scaling_silo_trap[${i}][type]"
                        class="form-select">

                        <option value="excel">Excel</option>

                        <option value="email">Email</option>

                        <option value="drive">Drive</option>

                        <option value="whatsapp">WhatsApp</option>

                        <option value="warning">Warning</option>

                        <option value="danger">Danger</option>

                    </select>

                </div>

                <div class="col-md-2 text-end">

                    <button
                        type="button"
                        class="btn btn-danger remove-silo">

                        X

                    </button>

                </div>

            </div>

        `
    });

});

</script>