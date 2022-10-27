@php
    $locale = $app->getLocale();
@endphp

<div role="dialog" aria-labelledby="lcc-modal-alert-label" aria-describedby="lcc-modal-alert-desc" aria-modal="true" class="lcc-modal lcc-modal--alert js-lcc-modal js-lcc-modal-alert" style="display: none;"
     data-cookie-key="{{ config('cookie-consent.cookie_key') }}"
     data-cookie-value-analytics="{{ config('cookie-consent.cookie_value_analytics') }}"
     data-cookie-value-marketing="{{ config('cookie-consent.cookie_value_marketing') }}"
     data-cookie-value-both="{{ config('cookie-consent.cookie_value_both') }}"
     data-cookie-value-none="{{ config('cookie-consent.cookie_value_none') }}"
     data-cookie-expiration-days="{{ config('cookie-consent.cookie_expiration_days') }}"
     data-gtm-event="{{ config('cookie-consent.gtm_event') }}"
     data-ignored-paths="{{ implode(',', config('cookie-consent.ignored_paths', [])) }}"
>
    <div class="lcc-modal__content">
        <h2 id="lcc-modal-alert-label" class="lcc-modal__title">
            @lang('Denne nettsiden bruker informasjonskapsler')
        </h2>
        <p id="lcc-modal-alert-desc" class="lcc-text">
            {!! trans('Denne nettsiden bruker informasjonskapsler for å forbedre din brukeropplevelse og statistikk. Ved å klikke på "Aksepter", godkjenner du disse informasjonskapslene.') !!}
        </p>
    </div>
    <div class="lcc-modal__actions">
        <button type="button" class="lcc-button js-lcc-accept">
            @lang('Aksepter')
        </button>
        <button type="button" class="lcc-button lcc-button--link js-lcc-essentials">
            @lang('Tillat kun nødvendige')
        </button>
        <button type="button" class="lcc-button lcc-button--link js-lcc-settings-toggle">
            @lang('Innstillinger')
        </button>
    </div>
</div>

<div role="dialog" aria-labelledby="lcc-modal-settings-label" aria-describedby="lcc-modal-settings-desc" aria-modal="true" class="lcc-modal lcc-modal--settings js-lcc-modal js-lcc-modal-settings" style="display: none;">
    <button class="lcc-modal__close js-lcc-settings-toggle" type="button">
        <span class="lcc-u-sr-only">
            @lang('Lukk')
        </span>
        &times;
    </button>
    <div class="lcc-modal__content">
        <div class="lcc-modal__content">
            <h2 id="lcc-modal-settings-label" class="lcc-modal__title">
                @lang('Innstillinger for informasjonskapsler')
            </h2>
            <p id="lcc-modal-settings-desc" class="lcc-text">
                {!! trans('Nettsiden bruker tre nivåer av informasjonskapsler. Du kan justere innstillingene når som helst. Om du ønsker mer informasjon om bruken av informasjonskapsler, se vår <a href=":policyUrl">informasjonsside</a>.', [ 'policyUrl' => config("cookie-consent.policy_url_$locale")]) !!}
            </p>
            <div class="lcc-modal__section lcc-u-text-center">
                <button type="button" class="lcc-button js-lcc-accept">
                    @lang('Godkjenn alle informasjonskapsler')
                </button>
            </div>
            <div class="lcc-modal__section">
                <label for="lcc-checkbox-essential" class="lcc-label">
                    <input type="checkbox" id="lcc-checkbox-essential" disabled="disabled" checked="checked">
                    <span>@lang('Funksjonalitet')</span>
                </label>
                <p class="lcc-text">
                    @lang('er informasjonskapsler som sikrer at nettsiden fungerer som den skal.')
                </p>
            </div>
            <div class="lcc-modal__section">
                <label for="lcc-checkbox-funtcional" class="lcc-label">
                    <input type="checkbox" id="lcc-checkbox-funtcional" disabled="disabled" checked="checked">
                    <span>@lang('Funksjonelle informasjonskapsler')</span>
                </label>
                <p class="lcc-text">
                    @lang('er nødvendig for spesifikk funksjonalitet på nettside. Uten de, vil deler av nettsiden ikke fungere.')
                </p>
            </div>
            <div class="lcc-modal__section">
                <label for="lcc-checkbox-analytics" class="lcc-label">
                    <input type="checkbox" id="lcc-checkbox-analytics">
                    <span>@lang('Statistikk og analyse')</span>
                </label>
                <p class="lcc-text">
                    @lang('tillater oss å analysere bruk av nettsiden og forbedre brukeropplevelsen.')
                </p>
            </div>
            <div class="lcc-modal__section">
                <label for="lcc-checkbox-marketing" class="lcc-label">
                    <input type="checkbox" id="lcc-checkbox-marketing">
                    <span>@lang('Markedsføring')</span>
                </label>
                <p class="lcc-text">
                    @lang('tillater oss å personalisere din opplevelse og sende deg relevant markedsføring.')
                </p>
            </div>
        </div>
    </div>
    <div class="lcc-modal__actions">
        <button type="button" class="lcc-button js-lcc-settings-save">
            @lang('Lagre')
        </button>
    </div>
</div>

<div class="lcc-backdrop js-lcc-backdrop" style="display: none;"></div>
<script type="text/javascript" src="{{ asset("vendor/cookie-consent/js/cookie-consent.js") }}"></script>