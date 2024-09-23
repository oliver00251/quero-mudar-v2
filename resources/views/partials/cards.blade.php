<div class="row mb-4">
    <div class="col-md-4">
        <div class="card card-custom total-card text-center">
            <div class="card-body">
                <i class="fas fa-money-bill-wave card-icon"></i>
                <h5 class="card-title">Total Geral</h5>
                <p class="card-text money">R$ {{ number_format($total_geral, 2, ',', '.') }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-custom entradas-card text-center">
            <div class="card-body">
                <i class="fas fa-arrow-up card-icon"></i>
                <h5 class="card-title">Entradas</h5>
                <p class="card-text money">R$ {{ number_format($total_entradas, 2, ',', '.') }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-custom saidas-card text-center">
            <div class="card-body">
                <i class="fas fa-arrow-down card-icon"></i>
                <h5 class="card-title">Saídas</h5>
                <p class="card-text money">R$ {{ number_format($total_saidas, 2, ',', '.') }}</p>
            </div>
        </div>
    </div>
</div>
