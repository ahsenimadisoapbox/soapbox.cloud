<div class="accordion-item mb-2">

    <h2 class="accordion-header">
        <a class="accordion-button collapsed text-decoration-none cursor-pointer"
           data-bs-toggle="collapse"
           data-bs-target="#silo">

            Scaling Silo Trap

        </a>
    </h2>

    <div id="silo" class="accordion-collapse collapse">

        <div class="accordion-body">

            <div id="silo-wrapper">

                @foreach(($industry->scaling_silo_trap ?? []) as $i => $item)

                    <div class="row mb-2">

                        <div class="col-md-5">

                            <input
                                type="text"
                                name="scaling_silo_trap[{{ $i }}][title]"
                                value="{{ $item['title'] ?? '' }}"
                                class="form-control"
                                placeholder="Title">

                        </div>

                        <div class="col-md-5">

                            <select
                                name="scaling_silo_trap[{{ $i }}][type]"
                                class="form-select">

                                <option value="excel"
                                    {{ ($item['type'] ?? '') == 'excel' ? 'selected' : '' }}>
                                    Excel
                                </option>

                                <option value="email"
                                    {{ ($item['type'] ?? '') == 'email' ? 'selected' : '' }}>
                                    Email
                                </option>

                                <option value="drive"
                                    {{ ($item['type'] ?? '') == 'drive' ? 'selected' : '' }}>
                                    Drive
                                </option>

                                <option value="whatsapp"
                                    {{ ($item['type'] ?? '') == 'whatsapp' ? 'selected' : '' }}>
                                    WhatsApp
                                </option>

                                <option value="warning"
                                    {{ ($item['type'] ?? '') == 'warning' ? 'selected' : '' }}>
                                    Warning
                                </option>

                                <option value="danger"
                                    {{ ($item['type'] ?? '') == 'danger' ? 'selected' : '' }}>
                                    Danger
                                </option>

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

                @endforeach

            </div>

            <button
                type="button"
                class="btn btn-success add-silo">

                + Add

            </button>

        </div>

    </div>

</div>