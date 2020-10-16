<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        OpenPay.setId('{{ config('cashier_openpay.id') }}')
        OpenPay.setApiKey('{{ config('cashier_openpay.public_key') }}')
        OpenPay.setSandboxMode({{ config('cashier_openpay.production_mode') ? 'false' : 'true' }})
    });
</script>
