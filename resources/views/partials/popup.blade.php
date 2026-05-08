<style>
    /* Better spacing + alignment */
    .theme-form {
        margin-top: 10px;
    }

    /* Inputs */
    .form-field {
        border-radius: 10px;
        padding: 12px 14px;
        border: 1px solid #e5e7eb;
        transition: all 0.2s ease;
    }

    /* Focus = your theme color */
    .form-field:focus {
        border-color: var(--blue);
        box-shadow: 0 0 0 2px rgba(13, 110, 253, 0.15);
    }

    /* Button (theme aligned, not flashy) */
    .theme-btn {
        border-radius: 10px;
        padding: 12px;
        font-weight: 600;
        letter-spacing: 0.3px;
        transition: all 0.25s ease;
    }

    /* Hover */
    .theme-btn:hover {
        transform: translateY(-1px);
        box-shadow: 0 8px 18px rgba(13, 110, 253, 0.2);
    }

    /* Click */
    .theme-btn:active {
        transform: scale(0.98);
    }
</style>

<div class="modal fade" id="demoPopup" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 border-0 shadow">

            <div class="modal-header border-0">
                <h5 class="modal-title fw-bold d-flex align-items-center gap-2"><i
                        class="bi bi-calendar-check text-primary"></i>
                    Book Your Free Demo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">

                <form action="{{ route('demo.store') }}" method="POST" class="theme-form">
                    @csrf

                    <div class="row g-3">
                        <div class="col-md-6">
                            <input name="first_name" class="form-control form-field" placeholder="First Name" required>
                        </div>
                        <div class="col-md-6">
                            <input name="last_name" class="form-control form-field" placeholder="Last Name" required>
                        </div>
                    </div>

                    <input name="email" type="email" class="form-control mt-3 form-field"
                        placeholder="Professional Email" required>

                    <div class="input-group mt-3">
                        <select class="form-select" style="max-width: 140px;" name="country">

                            <option value="+93">🇦🇫 Afghanistan (+93)</option>
                            <option value="+355">🇦🇱 Albania (+355)</option>
                            <option value="+213">🇩🇿 Algeria (+213)</option>
                            <option value="+1-684">🇦🇸 American Samoa (+1-684)</option>
                            <option value="+376">🇦🇩 Andorra (+376)</option>
                            <option value="+244">🇦🇴 Angola (+244)</option>
                            <option value="+1-264">🇦🇮 Anguilla (+1-264)</option>
                            <option value="+672">🇦🇶 Antarctica (+672)</option>
                            <option value="+1-268">🇦🇬 Antigua & Barbuda (+1-268)</option>
                            <option value="+54">🇦🇷 Argentina (+54)</option>
                            <option value="+374">🇦🇲 Armenia (+374)</option>
                            <option value="+297">🇦🇼 Aruba (+297)</option>
                            <option value="+61">🇦🇺 Australia (+61)</option>
                            <option value="+43">🇦🇹 Austria (+43)</option>
                            <option value="+994">🇦🇿 Azerbaijan (+994)</option>

                            <option value="+1-242">🇧🇸 Bahamas (+1-242)</option>
                            <option value="+973">🇧🇭 Bahrain (+973)</option>
                            <option value="+880">🇧🇩 Bangladesh (+880)</option>
                            <option value="+1-246">🇧🇧 Barbados (+1-246)</option>
                            <option value="+375">🇧🇾 Belarus (+375)</option>
                            <option value="+32">🇧🇪 Belgium (+32)</option>
                            <option value="+501">🇧🇿 Belize (+501)</option>
                            <option value="+229">🇧🇯 Benin (+229)</option>
                            <option value="+1-441">🇧🇲 Bermuda (+1-441)</option>
                            <option value="+975">🇧🇹 Bhutan (+975)</option>
                            <option value="+591">🇧🇴 Bolivia (+591)</option>
                            <option value="+387">🇧🇦 Bosnia (+387)</option>
                            <option value="+267">🇧🇼 Botswana (+267)</option>
                            <option value="+55">🇧🇷 Brazil (+55)</option>
                            <option value="+246">🇮🇴 British Indian Ocean (+246)</option>
                            <option value="+673">🇧🇳 Brunei (+673)</option>
                            <option value="+359">🇧🇬 Bulgaria (+359)</option>
                            <option value="+226">🇧🇫 Burkina Faso (+226)</option>
                            <option value="+257">🇧🇮 Burundi (+257)</option>

                            <option value="+855">🇰🇭 Cambodia (+855)</option>
                            <option value="+237">🇨🇲 Cameroon (+237)</option>
                            <option value="+1">🇨🇦 Canada (+1)</option>
                            <option value="+238">🇨🇻 Cape Verde (+238)</option>
                            <option value="+1-345">🇰🇾 Cayman Islands (+1-345)</option>
                            <option value="+236">🇨🇫 Central African Republic (+236)</option>
                            <option value="+235">🇹🇩 Chad (+235)</option>
                            <option value="+56">🇨🇱 Chile (+56)</option>
                            <option value="+86">🇨🇳 China (+86)</option>
                            <option value="+61">🇨🇽 Christmas Island (+61)</option>
                            <option value="+57">🇨🇴 Colombia (+57)</option>
                            <option value="+269">🇰🇲 Comoros (+269)</option>
                            <option value="+242">🇨🇬 Congo (+242)</option>
                            <option value="+243">🇨🇩 Congo (DRC) (+243)</option>
                            <option value="+682">🇨🇰 Cook Islands (+682)</option>
                            <option value="+506">🇨🇷 Costa Rica (+506)</option>
                            <option value="+385">🇭🇷 Croatia (+385)</option>
                            <option value="+53">🇨🇺 Cuba (+53)</option>
                            <option value="+357">🇨🇾 Cyprus (+357)</option>
                            <option value="+420">🇨🇿 Czech Republic (+420)</option>

                            <option value="+45">🇩🇰 Denmark (+45)</option>
                            <option value="+253">🇩🇯 Djibouti (+253)</option>
                            <option value="+1-767">🇩🇲 Dominica (+1-767)</option>
                            <option value="+1-809">🇩🇴 Dominican Republic (+1-809)</option>

                            <option value="+593">🇪🇨 Ecuador (+593)</option>
                            <option value="+20">🇪🇬 Egypt (+20)</option>
                            <option value="+503">🇸🇻 El Salvador (+503)</option>
                            <option value="+240">🇬🇶 Equatorial Guinea (+240)</option>
                            <option value="+291">🇪🇷 Eritrea (+291)</option>
                            <option value="+372">🇪🇪 Estonia (+372)</option>
                            <option value="+251">🇪🇹 Ethiopia (+251)</option>

                            <option value="+679">🇫🇯 Fiji (+679)</option>
                            <option value="+358">🇫🇮 Finland (+358)</option>
                            <option value="+33">🇫🇷 France (+33)</option>

                            <option value="+220">🇬🇲 Gambia (+220)</option>
                            <option value="+995">🇬🇪 Georgia (+995)</option>
                            <option value="+49">🇩🇪 Germany (+49)</option>
                            <option value="+233">🇬🇭 Ghana (+233)</option>
                            <option value="+30">🇬🇷 Greece (+30)</option>

                            <option value="+852">🇭🇰 Hong Kong (+852)</option>
                            <option value="+36">🇭🇺 Hungary (+36)</option>

                            <option value="+91" selected>🇮🇳 India (+91)</option>
                            <option value="+62">🇮🇩 Indonesia (+62)</option>
                            <option value="+98">🇮🇷 Iran (+98)</option>
                            <option value="+964">🇮🇶 Iraq (+964)</option>
                            <option value="+353">🇮🇪 Ireland (+353)</option>
                            <option value="+972">🇮🇱 Israel (+972)</option>
                            <option value="+39">🇮🇹 Italy (+39)</option>

                            <option value="+81">🇯🇵 Japan (+81)</option>
                            <option value="+962">🇯🇴 Jordan (+962)</option>

                            <option value="+7">🇰🇿 Kazakhstan (+7)</option>
                            <option value="+254">🇰🇪 Kenya (+254)</option>
                            <option value="+965">🇰🇼 Kuwait (+965)</option>

                            <option value="+856">🇱🇦 Laos (+856)</option>
                            <option value="+371">🇱🇻 Latvia (+371)</option>
                            <option value="+961">🇱🇧 Lebanon (+961)</option>

                            <option value="+60">🇲🇾 Malaysia (+60)</option>
                            <option value="+960">🇲🇻 Maldives (+960)</option>

                            <option value="+52">🇲🇽 Mexico (+52)</option>
                            <option value="+95">🇲🇲 Myanmar (+95)</option>

                            <option value="+977">🇳🇵 Nepal (+977)</option>
                            <option value="+31">🇳🇱 Netherlands (+31)</option>
                            <option value="+64">🇳🇿 New Zealand (+64)</option>

                            <option value="+234">🇳🇬 Nigeria (+234)</option>
                            <option value="+850">🇰🇵 North Korea (+850)</option>
                            <option value="+82">🇰🇷 South Korea (+82)</option>

                            <option value="+968">🇴🇲 Oman (+968)</option>

                            <option value="+92">🇵🇰 Pakistan (+92)</option>
                            <option value="+970">🇵🇸 Palestine (+970)</option>

                            <option value="+63">🇵🇭 Philippines (+63)</option>
                            <option value="+48">🇵🇱 Poland (+48)</option>
                            <option value="+351">🇵🇹 Portugal (+351)</option>

                            <option value="+974">🇶🇦 Qatar (+974)</option>

                            <option value="+40">🇷🇴 Romania (+40)</option>
                            <option value="+7">🇷🇺 Russia (+7)</option>

                            <option value="+966">🇸🇦 Saudi Arabia (+966)</option>
                            <option value="+65">🇸🇬 Singapore (+65)</option>
                            <option value="+27">🇿🇦 South Africa (+27)</option>
                            <option value="+34">🇪🇸 Spain (+34)</option>
                            <option value="+94">🇱🇰 Sri Lanka (+94)</option>
                            <option value="+46">🇸🇪 Sweden (+46)</option>
                            <option value="+41">🇨🇭 Switzerland (+41)</option>

                            <option value="+963">🇸🇾 Syria (+963)</option>

                            <option value="+886">🇹🇼 Taiwan (+886)</option>
                            <option value="+66">🇹🇭 Thailand (+66)</option>
                            <option value="+90">🇹🇷 Turkey (+90)</option>

                            <option value="+971">🇦🇪 UAE (+971)</option>
                            <option value="+44">🇬🇧 United Kingdom (+44)</option>
                            <option value="+1">🇺🇸 United States (+1)</option>

                            <option value="+84">🇻🇳 Vietnam (+84)</option>

                            <option value="+967">🇾🇪 Yemen (+967)</option>
                            <option value="+263">🇿🇼 Zimbabwe (+263)</option>

                        </select>

                        <input name="phone" class="form-control form-field" placeholder="Phone Number">
                    </div>


                    <input name="company" class="form-control mt-3 form-field" placeholder="Company Name">

                    <input type="hidden" name="country" id="country">

                    <button type="submit" class="btn btn-custome text-white w-100 mt-4 theme-btn">
                        Book My Free Demo →
                    </button>
                </form>

            </div>

        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {

        setTimeout(() => {
            const modal = new bootstrap.Modal(document.getElementById('demoPopup'));
            modal.show();
        }, 5000); // 5 seconds

        const codeSelect = document.querySelector('[name="country_code"]');
        const countryInput = document.getElementById('country');

        // set default on load
        updateCountry();

        codeSelect.addEventListener('change', updateCountry);

        function updateCountry() {
            const selected = codeSelect.options[codeSelect.selectedIndex];
            const country = selected.getAttribute('data-country');

            countryInput.value = country;
        }

    });

    document.addEventListener("DOMContentLoaded", function () {

        document.querySelectorAll('[name="country_code"] option').forEach(option => {
            const text = option.textContent;

            // Extract country name (before "(")
            let country = text.split('(')[0].trim();

            // Remove emoji/flags at start
            country = country.replace(/^[^\w]+/, '').trim();

            option.setAttribute('data-country', country);
        });

    });



</script>