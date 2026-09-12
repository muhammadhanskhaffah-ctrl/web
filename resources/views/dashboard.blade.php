<x-app-layout>

<style>

/* =========================================================
   DASHBOARD MODERN - PETRA TEXTIMA
========================================================= */

* {
    box-sizing: border-box;
}

.dashboard-container {
    min-height: 100vh;
    background: #f5f7fb;
    padding: 10px 40px 60px;
    color: #0f2747;
    position: relative;
}


/* =========================================================
   HEADER
========================================================= */

.dashboard-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 25px;
    margin-bottom: 30px;
}

.dashboard-header-left {
    flex: 1;
}

.dashboard-title {
    margin: 0;
    font-size: 32px;
    line-height: 1.2;
    font-weight: 800;
    letter-spacing: -0.8px;
    color: #0b1f44;
}

.dashboard-subtitle {
    margin: 8px 0 0;
    font-size: 13px;
    color: #64748b;
}


/* =========================================================
   PERIODE EVALUASI
========================================================= */

.period-card {
    position: absolute;
    top: 20px;
    right: 40px;

    display: flex;
    align-items: center;
    gap: 11px;
    min-width: 205px;
    padding: 12px 15px;
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 15px;
    box-shadow: 0 8px 24px rgba(15, 39, 71, .06);
}

.period-icon {
    width: 43px;
    height: 43px;
    border-radius: 12px;
    background: #eaf2ff;
    color: #2563eb;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 19px;
}

.period-label {
    font-size: 10px;
    text-transform: uppercase;
    letter-spacing: .7px;
    color: #94a3b8;
    margin-bottom: 4px;
}

.period-value {
    font-size: 13px;
    font-weight: 750;
    color: #0f2747;
}


/* =========================================================
   KPI CARDS
========================================================= */

.stats-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 16px;
    margin-bottom: 30px;
}

.stat-card {
    position: relative;
    overflow: hidden;
    min-height: 135px;
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 20px;
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 18px;
    box-shadow: 0 8px 25px rgba(15, 39, 71, .055);
    transition: .25s ease;
}

.stat-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 15px 35px rgba(15, 39, 71, .10);
}

.stat-card::after {
    content: "";
    position: absolute;
    width: 125px;
    height: 125px;
    right: -55px;
    top: -55px;
    border-radius: 50%;
    opacity: .65;
}

.stat-card.blue {
    border-top: 3px solid #0B2A6F;
}

.stat-card.blue::after {
    background: #dbeafe;
}

.stat-card.purple {
    border-top: 3px solid #0B2A6F;
}

.stat-card.purple::after {
    background: #dbeafe;
}

.stat-card.cyan {
    border-top: 3px solid #0B2A6F;
}

.stat-card.cyan::after {
    background: #dbeafe;
}

.stat-card.green {
    border-top: 3px solid #0B2A6F;
}

.stat-card.green::after {
    background: #dbeafe;
}

.stat-icon {
    width: 56px;
    height: 56px;
    min-width: 56px;
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    z-index: 2;
}

.stat-icon svg {
    width: 30px;
    height: 30px;
    stroke-width: 2;
}

.stat-icon.blue {
    background: #e0ecff;
    color: #0B2A6F;
}

.stat-icon.purple {
    background: #e0ecff;
    color: #0B2A6F;
}

.stat-icon.cyan {
    background: #e0ecff;
    color: #0B2A6F;
}

.stat-icon.green {
    background: #e0ecff;
    color: #0B2A6F;
}

.stat-content {
    position: relative;
    z-index: 2;
    min-width: 0;
}

.stat-label {
    font-size: 13px;
    font-weight: 550;
    color: #64748b;
    margin-bottom: 8px;
}

.stat-number {
    font-size: 30px;
    line-height: 1;
    font-weight: 800;
    letter-spacing: -.8px;
}

.stat-number.blue {
    color: #0B2A6F;
}

.stat-number.purple {
    color: #0B2A6F;
}

.stat-number.cyan {
    color: #0B2A6F;
}

.stat-number.green {
    color: #0B2A6F;
}


/* =========================================================
   SECTION TITLE
========================================================= */

.section-heading {
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
    margin-bottom: 16px;
}

.section-heading-left h2 {
    margin: 0;
    font-size: 19px;
    font-weight: 800;
    color: #0f172a;
}

.section-heading-left p {
    margin: 5px 0 0;
    font-size: 13px;
    color: #64748b;
}


/* =========================================================
   PENCAPAIAN - DONUT CHART
========================================================= */

.category-chart {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 18px;
    padding: 25px 28px;
    margin-bottom: 28px;
    box-shadow: 0 7px 22px rgba(15, 39, 71, .045);
}


/* =========================================================
   PERBAIKAN LAYOUT DONUT
========================================================= */

.category-chart-content {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 28px;
    min-height: 220px;
    width: 100%;
}

.donut-wrapper {
    position: relative;
    width: 180px;
    height: 180px;
    flex-shrink: 0;
}

.donut-chart {
    width: 180px;
    height: 180px;
    border-radius: 50%;
    position: relative;

    background: conic-gradient(
        #16a34a 0% var(--baik),
        #f59e0b var(--baik) var(--sedang),
        #dc2626 var(--sedang) 100%
    );
}

.donut-chart::before {
    content: "";
    position: absolute;
    inset: 34px;
    background: #ffffff;
    border-radius: 50%;
}

.donut-center {
    position: absolute;
    inset: 0;
    z-index: 2;

    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;

    pointer-events: none;
}

.donut-total {
    font-size: 28px;
    line-height: 1;
    font-weight: 800;
    color: #0B2A6F;
}

.donut-total-label {
    margin-top: 6px;
    font-size: 12px;
    color: #64748b;
    font-weight: 600;
}

.category-legend {
    min-width: 0;
    width: 100%;
    max-width: 230px;
}

.category-legend-title {
    margin-bottom: 15px;
    font-size: 14px;
    font-weight: 800;
    color: #0f172a;
}

.category-legend-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 15px;
    padding: 12px 0;
    border-bottom: 1px solid #eef2f7;
}

.category-legend-item:last-child {
    border-bottom: none;
}

.category-legend-left {
    display: flex;
    align-items: center;
    gap: 10px;
    min-width: 0;
}

.category-legend-dot {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    flex-shrink: 0;
}

.category-legend-dot.good {
    background: #16a34a;
}

.category-legend-dot.medium {
    background: #f59e0b;
}

.category-legend-dot.low {
    background: #dc2626;
}

.category-legend-label {
    font-size: 13px;
    font-weight: 650;
    color: #334155;
}

.category-legend-value {
    font-size: 15px;
    font-weight: 800;
    color: #0f172a;
    white-space: nowrap;
}

.category-legend-percent {
    margin-left: 4px;
    font-size: 11px;
    font-weight: 600;
    color: #64748b;
}


/* =========================================================
   GRAFIK TREN PENCAPAIAN
========================================================= */

.performance-chart-grid {
    display: grid;
    grid-template-columns: 1.45fr 1fr;
    gap: 16px;
    margin-bottom: 26px;
}

.performance-chart-card {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 18px;
    padding: 22px 24px;
    box-shadow: 0 7px 22px rgba(15, 39, 71, .045);
    min-width: 0;
}

.performance-chart-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 15px;
    margin-bottom: 20px;
}

.performance-chart-title {
    margin: 0;
    font-size: 17px;
    font-weight: 800;
    color: #0f172a;
}

.performance-chart-subtitle {
    margin: 5px 0 0;
    font-size: 12px;
    color: #64748b;
}

.performance-chart-badge {
    padding: 7px 11px;
    border-radius: 8px;
    background: #f1f5f9;
    color: #475569;
    font-size: 10px;
    font-weight: 700;
    white-space: nowrap;
}

.trend-chart {
    position: relative;
    height: 245px;
    display: flex;
    align-items: flex-end;
    gap: 12px;
    padding: 20px 8px 30px 38px;
    border-bottom: 1px solid #e2e8f0;

    background:
        linear-gradient(
            to bottom,
            transparent 24.5%,
            #eef2f7 25%,
            transparent 25.5%,
            transparent 49.5%,
            #eef2f7 50%,
            transparent 50.5%,
            transparent 74.5%,
            #eef2f7 75%,
            transparent 75.5%
        );
}

.trend-y-label {
    position: absolute;
    left: 0;
    font-size: 9px;
    color: #94a3b8;
}

.trend-y-100 {
    top: 17px;
}

.trend-y-75 {
    top: 72px;
}

.trend-y-50 {
    top: 127px;
}

.trend-y-25 {
    top: 182px;
}

.trend-y-0 {
    bottom: 4px;
}

.trend-item {
    flex: 1;
    height: 100%;
    min-width: 30px;

    display: flex;
    flex-direction: column;
    justify-content: flex-end;
    align-items: center;

    position: relative;
}

.trend-bar-wrapper {
    width: 100%;
    height: 185px;

    display: flex;
    align-items: flex-end;
    justify-content: center;
}

.trend-bar {
    width: min(48px, 72%);
    min-height: 2px;
    height: calc(var(--trend-value) * 1.85px);
    max-height: 185px;

    background: #bfdbfe;

    border-radius: 7px 7px 0 0;

    transition: height .8s ease;
}

.trend-value {
    position: absolute;

    bottom:
        calc(
            30px +
            (var(--trend-value) * 1.85px) +
            5px
        );

    font-size: 10px;
    font-weight: 750;
    color: #174ea6;
}

.trend-month {
    position: absolute;
    bottom: -25px;

    font-size: 10px;
    font-weight: 650;
    color: #64748b;
}

.trend-empty {
    width: 100%;
    height: 245px;

    display: flex;
    align-items: center;
    justify-content: center;

    text-align: center;

    color: #64748b;
    font-size: 12px;

    border: 1px dashed #dbe3ec;
    border-radius: 12px;
}


/* =========================================================
   STATUS EVALUASI
========================================================= */

.evaluation-status-card {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 18px;
    padding: 27px;
    margin-bottom: 28px;
    box-shadow: 0 8px 25px rgba(15, 39, 71, .05);
}

.evaluation-status-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 20px;
    margin-bottom: 24px;
}

.evaluation-status-title-wrapper {
    display: flex;
    align-items: center;
    gap: 12px;
}

.evaluation-status-icon {
    width: 45px;
    height: 45px;
    border-radius: 13px;
    background: #eaf2ff;
    color: #2563eb;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 19px;
}

.evaluation-status-title {
    margin: 0;
    font-size: 18px;
    font-weight: 800;
    color: #0f172a;
}

.evaluation-status-subtitle {
    margin: 4px 0 0;
    font-size: 13px;
    color: #64748b;
}

.evaluation-period-badge {
    padding: 8px 14px;
    border-radius: 9px;
    background: #f1f5f9;
    color: #475569;
    font-size: 11px;
    font-weight: 750;
}

.evaluation-status-content {
    display: grid;
    grid-template-columns: 1fr 2fr auto;
    align-items: center;
    gap: 28px;
    padding: 23px;
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    border-radius: 15px;
}

.evaluation-label {
    font-size: 12px;
    color: #64748b;
    margin-bottom: 7px;
}

.evaluation-number {
    font-size: 33px;
    line-height: 1;
    font-weight: 800;
    color: #174ea6;
}

.evaluation-number span {
    font-size: 16px;
    font-weight: 500;
    color: #94a3b8;
}

.evaluation-description {
    margin-top: 8px;
    font-size: 11px;
    color: #94a3b8;
}

.evaluation-progress-section {
    min-width: 0;
}

.evaluation-progress-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 9px;
    font-size: 12px;
    color: #64748b;
}

.evaluation-progress-header strong {
    font-size: 13px;
    color: #2563eb;
}

.evaluation-progress-background {
    width: 100%;
    height: 13px;
    background: #e2e8f0;
    border-radius: 999px;
    overflow: hidden;
}

.evaluation-progress-bar {
    width: 0;
    height: 100%;
    background: linear-gradient(
        90deg,
        #174ea6,
        #2563eb,
        #3b82f6
    );
    border-radius: 999px;
    transition: width .8s ease;
}

.evaluation-progress-info {
    display: flex;
    justify-content: space-between;
    gap: 15px;
    margin-top: 8px;
    font-size: 10px;
    color: #94a3b8;
}

.evaluation-status-badge-wrapper {
    display: flex;
    justify-content: flex-end;
}

.evaluation-status-badge {
    padding: 9px 15px;
    border-radius: 999px;
    font-size: 11px;
    font-weight: 750;
    white-space: nowrap;
}

.evaluation-complete {
    background: #dcfce7;
    color: #166534;
}

.evaluation-progress {
    background: #dbeafe;
    color: #1d4ed8;
}

.evaluation-not-started {
    background: #f1f5f9;
    color: #64748b;
}


/* =========================================================
   CARD UMUM
========================================================= */

.dashboard-card {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 18px;
    padding: 27px;
    margin-bottom: 28px;
    box-shadow: 0 8px 25px rgba(15, 39, 71, .05);
}

.card-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-bottom: 21px;
}

.card-title-wrapper {
    display: flex;
    align-items: center;
    gap: 11px;
}

.card-title-icon {
    width: 43px;
    height: 43px;
    border-radius: 12px;
    background: #eaf2ff;
    color: #2563eb;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
}

.card-title {
    margin: 0;
    font-size: 18px;
    font-weight: 800;
    color: #0f172a;
}

.card-subtitle {
    margin: 4px 0 0;
    font-size: 13px;
    color: #64748b;
}

.card-badge {
    padding: 7px 12px;
    background: #f1f5f9;
    color: #475569;
    border-radius: 8px;
    font-size: 11px;
    font-weight: 650;
}


/* =========================================================
   TABLE
========================================================= */

.table-wrapper {
    overflow-x: auto;
    border: 1px solid #e2e8f0;
    border-radius: 13px;
}

.monitoring-table {
    width: 100%;
    border-collapse: collapse;
    min-width: 700px;
}

.monitoring-table th {
    padding: 14px 15px;
    text-align: left;
    font-size: 11px;
    font-weight: 750;
    text-transform: uppercase;
    letter-spacing: .4px;
    color: #64748b;
    background: #f8fafc;
    border-bottom: 1px solid #e2e8f0;
}

.monitoring-table td {
    padding: 16px 15px;
    font-size: 13px;
    color: #334155;
    border-bottom: 1px solid #edf2f7;
}

.monitoring-table tr:last-child td {
    border-bottom: none;
}

.monitoring-table tbody tr {
    transition: background .15s ease;
}

.monitoring-table tbody tr:hover {
    background: #f8fbff;
}

.monitoring-table .center {
    text-align: center;
}

.number-cell {
    width: 45px;
    color: #94a3b8 !important;
    font-weight: 650;
}

.employee-wrapper {
    display: flex;
    align-items: center;
    gap: 11px;
}

.employee-avatar {
    width: 39px;
    height: 39px;
    min-width: 39px;
    border-radius: 11px;
    background: #eaf2ff;
    color: #174ea6;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 13px;
    font-weight: 800;
}

.employee-name {
    font-weight: 700;
    color: #0f172a;
}

.goal-name {
    font-weight: 550;
    color: #334155;
}


/* =========================================================
   BADGE
========================================================= */

.achievement-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 6px 11px;
    border-radius: 999px;
    font-size: 11px;
    font-weight: 750;
}

.achievement-good {
    background: #dcfce7;
    color: #166534;
}

.achievement-medium {
    background: #fef3c7;
    color: #92400e;
}

.achievement-low {
    background: #fee2e2;
    color: #991b1b;
}


/* =========================================================
   GRAFIK
========================================================= */

.graph-item {
    padding: 21px;
    border: 1px solid #e2e8f0;
    border-radius: 14px;
    margin-bottom: 14px;
    background: #fbfdff;
}

.graph-item:last-child {
    margin-bottom: 0;
}

.graph-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 15px;
    margin-bottom: 11px;
}

.graph-employee {
    font-size: 13px;
    font-weight: 750;
    color: #0f172a;
}

.graph-goal {
    margin-top: 4px;
    font-size: 12px;
    color: #64748b;
}

.graph-percentage {
    font-size: 15px;
    font-weight: 800;
}

.graph-percentage.graph-good {
    color: #16a34a;
}

.graph-percentage.graph-medium {
    color: #d97706;
}

.graph-percentage.graph-low {
    color: #dc2626;
}

.graph-bar-background {
    width: 100%;
    height: 12px;
    background: #e8edf4;
    border-radius: 999px;
    overflow: hidden;
}

.graph-bar {
    width: 0;
    height: 100%;
    border-radius: 999px;
    transition: width .8s ease;
}

.graph-good {
    background: #16a34a;
}

.graph-medium {
    background: #d97706;
}

.graph-low {
    background: #dc2626;
}

.graph-info {
    display: flex;
    justify-content: space-between;
    margin-top: 9px;
    font-size: 11px;
    color: #64748b;
}

.graph-info strong {
    color: #334155;
    font-weight: 700;
}


/* =========================================================
   EMPTY
========================================================= */

.empty-data {
    padding: 50px 20px;
    text-align: center;
    color: #64748b;
}

.empty-icon {
    width: 58px;
    height: 58px;
    margin: 0 auto 13px;
    border-radius: 16px;
    background: #f1f5f9;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
}

.empty-title {
    font-size: 14px;
    font-weight: 700;
    color: #334155;
}


/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 1150px) {

    .dashboard-container {
        padding: 30px;
    }

    .stats-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .evaluation-status-content {
        grid-template-columns: 1fr 1.5fr;
    }

    .evaluation-status-badge-wrapper {
        grid-column: 1 / -1;
        justify-content: flex-start;
    }

}


@media (max-width: 800px) {

    .dashboard-header {
        flex-direction: column;
        align-items: flex-start;
    }

    .period-card {
        position: static;
        width: 100%;
    }

    .category-grid {
        grid-template-columns: 1fr;
    }

    .evaluation-status-content {
        grid-template-columns: 1fr;
        gap: 20px;
    }

    .evaluation-status-badge-wrapper {
        justify-content: flex-start;
    }

    .performance-chart-grid {
        grid-template-columns: 1fr;
    }

    .category-chart-content {
        gap: 20px;
    }

    .donut-wrapper,
    .donut-chart {
        width: 170px;
        height: 170px;
    }

    .donut-chart::before {
        inset: 32px;
    }

    .category-legend {
        max-width: 220px;
    }

}


@media (max-width: 600px) {

    .dashboard-container {
        padding: 22px 16px 35px;
    }

    .stats-grid {
        grid-template-columns: 1fr;
    }

    .dashboard-title {
        font-size: 26px;
    }

    .stat-card {
        min-height: 125px;
    }

    .dashboard-card {
        padding: 18px;
    }

    .evaluation-status-card {
        padding: 18px;
    }

    .evaluation-status-header {
        flex-direction: column;
        align-items: flex-start;
    }

    .evaluation-period-badge {
        width: 100%;
        text-align: center;
    }

    .evaluation-progress-info {
        flex-direction: column;
        gap: 4px;
    }

    .card-badge {
        display: none;
    }

    .graph-header {
        align-items: flex-start;
    }

    .performance-chart-card {
        padding: 20px 15px;
    }

    .performance-chart-header {
        flex-direction: column;
    }

    .performance-chart-badge {
        display: none;
    }

    .trend-chart {
        gap: 6px;
        padding-left: 30px;
    }

    .trend-value {
        font-size: 9px;
    }

    .category-chart {
        padding: 20px 15px;
    }

    .category-chart-content {
        flex-direction: column;
        gap: 25px;
    }

    .donut-wrapper,
    .donut-chart {
        width: 180px;
        height: 180px;
    }

    .donut-chart::before {
        inset: 34px;
    }

    .category-legend {
        width: 100%;
        max-width: none;
        min-width: 0;
    }

}

</style>


<div class="dashboard-container">


    {{-- =========================================================
         HEADER
    ========================================================== --}}

    <div class="dashboard-header">

        <div class="dashboard-header-left">

            <h1 class="dashboard-title">
                Dashboard Kinerja
            </h1>

            <p class="dashboard-subtitle">
                Ringkasan kinerja karyawan dan pencapaian target perusahaan.
            </p>

        </div>


        <div class="period-card">

            <div class="period-icon">
                📅
            </div>

            <div>

                <div class="period-label">
                    Periode Evaluasi
                </div>

                <div class="period-value">
                    Semester 1 · 2026
                </div>

            </div>

        </div>

    </div>


    {{-- =========================================================
         STATISTIK UTAMA
    ========================================================== --}}

    <div class="stats-grid">


        {{-- TOTAL KARYAWAN --}}

        <div class="stat-card blue">

            <div class="stat-icon blue">

                <svg viewBox="0 0 24 24" fill="none"
                     xmlns="http://www.w3.org/2000/svg">

                    <path
                        d="M16 21V19C16 16.7909 14.2091 15 12 15H6C3.79086 15 2 16.7909 2 19V21"
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"/>

                    <circle
                        cx="9"
                        cy="7"
                        r="4"
                        stroke="currentColor"/>

                    <path
                        d="M22 21V19C22 17.3646 21.0115 15.9607 19.6 15.4336"
                        stroke="currentColor"
                        stroke-linecap="round"/>

                    <path
                        d="M16 3.13C17.7659 3.5875 19 5.18342 19 7C19 8.81658 17.7659 10.4125 16 10.87"
                        stroke="currentColor"
                        stroke-linecap="round"/>

                </svg>

            </div>

            <div class="stat-content">

                <div class="stat-label">
                    Total Karyawan
                </div>

                <div class="stat-number blue">
                    {{ $totalKaryawan }}
                </div>

            </div>

        </div>


        {{-- TOTAL GOALS --}}

        <div class="stat-card purple">

            <div class="stat-icon purple">

                <svg viewBox="0 0 24 24" fill="none"
                     xmlns="http://www.w3.org/2000/svg">

                    <path
                        d="M12 3L14.78 8.63L21 9.54L16.5 13.93L17.56 20.13L12 17.2L6.44 20.13L7.5 13.93L3 9.54L9.22 8.63L12 3Z"
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"/>

                    <path
                        d="M12 7.5L13.3 10.13L16.2 10.55L14.1 12.6L14.6 15.5L12 14.13L9.4 15.5L9.9 12.6L7.8 10.55L10.7 10.13L12 7.5Z"
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"/>

                </svg>

            </div>

            <div class="stat-content">

                <div class="stat-label">
                    Total Goals
                </div>

                <div class="stat-number purple">
                    {{ $totalGoal }}
                </div>

            </div>

        </div>


        {{-- TOTAL MONITORING --}}

        <div class="stat-card cyan">

            <div class="stat-icon cyan">

                <svg viewBox="0 0 24 24" fill="none"
                     xmlns="http://www.w3.org/2000/svg">

                    <rect
                        x="5"
                        y="3"
                        width="14"
                        height="18"
                        rx="2"
                        stroke="currentColor"/>

                    <path
                        d="M8 8L9.5 9.5L12 7"
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"/>

                    <path
                        d="M14 8H16"
                        stroke="currentColor"
                        stroke-linecap="round"/>

                    <path
                        d="M8 12L9.5 13.5L12 11"
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"/>

                    <path
                        d="M14 12H16"
                        stroke="currentColor"
                        stroke-linecap="round"/>

                    <path
                        d="M8 16L9.5 17.5L12 15"
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"/>

                    <path
                        d="M14 16H16"
                        stroke="currentColor"
                        stroke-linecap="round"/>

                </svg>

            </div>

            <div class="stat-content">

                <div class="stat-label">
                    Total Monitoring
                </div>

                <div class="stat-number cyan">
                    {{ $totalMonitoring }}
                </div>

            </div>

        </div>


        {{-- RATA-RATA PENCAPAIAN --}}

        <div class="stat-card green">

            <div class="stat-icon green">

                <svg viewBox="0 0 24 24" fill="none"
                     xmlns="http://www.w3.org/2000/svg">

                    <path
                        d="M4 19V14"
                        stroke="currentColor"
                        stroke-linecap="round"/>

                    <path
                        d="M9.5 19V10"
                        stroke="currentColor"
                        stroke-linecap="round"/>

                    <path
                        d="M15 19V13"
                        stroke="currentColor"
                        stroke-linecap="round"/>

                    <path
                        d="M20.5 19V5"
                        stroke="currentColor"
                        stroke-linecap="round"/>

                    <path
                        d="M3 9L8 6L13 9L21 3"
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"/>

                    <path
                        d="M17.5 3H21V6.5"
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"/>

                </svg>

            </div>

            <div class="stat-content">

                <div class="stat-label">
                    Rata-rata Pencapaian
                </div>

                <div class="stat-number green">
                    {{ number_format($rataRataPencapaian, 2, ',', '.') }}%
                </div>

            </div>

        </div>

    </div>


    {{-- =========================================================
         RINGKASAN PENCAPAIAN
    ========================================================== --}}

    <div class="section-heading">

        <div class="section-heading-left">

            <h2>
                Ringkasan Pencapaian
            </h2>

            <p>
                Distribusi dan tren pencapaian kinerja karyawan.
            </p>

        </div>

    </div>


    @php

        $nilaiBaik = (int) $pencapaianBaik;
        $nilaiSedang = (int) $pencapaianSedang;
        $nilaiRendah = (int) $pencapaianRendah;

        $totalKategori =
            $nilaiBaik +
            $nilaiSedang +
            $nilaiRendah;

        if ($totalKategori > 0) {

            $persenBaik =
                ($nilaiBaik / $totalKategori) * 100;

            $persenSedang =
                ($nilaiSedang / $totalKategori) * 100;

            $persenRendah =
                ($nilaiRendah / $totalKategori) * 100;

        } else {

            $persenBaik = 0;
            $persenSedang = 0;
            $persenRendah = 0;

        }

        $batasBaik = $persenBaik;

        $batasSedang =
            $persenBaik +
            $persenSedang;

    @endphp


    <div class="performance-chart-grid">


        {{-- =====================================================
             TREN PENCAPAIAN KINERJA
        ====================================================== --}}

        <div class="performance-chart-card">

            <div class="performance-chart-header">

                <div>

                    <h3 class="performance-chart-title">
                        Tren Pencapaian Kinerja
                    </h3>

                    <p class="performance-chart-subtitle">
                        Rata-rata pencapaian berdasarkan data monitoring setiap bulan.
                    </p>

                </div>

                <div class="performance-chart-badge">
                    Monitoring
                </div>

            </div>


            @if($trendPencapaian->count() > 0)

                <div class="trend-chart">

                    <span class="trend-y-label trend-y-100">
                        100%
                    </span>

                    <span class="trend-y-label trend-y-75">
                        75%
                    </span>

                    <span class="trend-y-label trend-y-50">
                        50%
                    </span>

                    <span class="trend-y-label trend-y-25">
                        25%
                    </span>

                    <span class="trend-y-label trend-y-0">
                        0%
                    </span>


                    @foreach($trendPencapaian as $trend)

                        @php

                            $nilaiTrend = min(
                                max(
                                    (float) $trend['rata_rata'],
                                    0
                                ),
                                100
                            );

                        @endphp


                        <div
                            class="trend-item"
                            style="--trend-value: {{ $nilaiTrend }};"
                        >

                            <div class="trend-bar-wrapper">

                                <div class="trend-bar"></div>

                            </div>


                            <div class="trend-value">

                                {{ number_format(
                                    $nilaiTrend,
                                    0,
                                    ',',
                                    '.'
                                ) }}%

                            </div>


                            <div class="trend-month">

                                {{ $trend['label'] }}

                            </div>

                        </div>

                    @endforeach

                </div>

            @else

                <div class="trend-empty">

                    Belum ada data monitoring untuk menampilkan tren pencapaian.

                </div>

            @endif

        </div>


        {{-- =====================================================
             DISTRIBUSI PENCAPAIAN
        ====================================================== --}}

        <div class="performance-chart-card">

            <div class="performance-chart-header">

                <div>

                    <h3 class="performance-chart-title">
                        Distribusi Pencapaian Kinerja
                    </h3>

                    <p class="performance-chart-subtitle">
                        Distribusi berdasarkan kategori pencapaian.
                    </p>

                </div>

                <div class="performance-chart-badge">
                    Kinerja
                </div>

            </div>


            <div
                class="category-chart-content"
                style="
                    --baik: {{ $batasBaik }}%;
                    --sedang: {{ $batasSedang }}%;
                "
            >

                <div class="donut-wrapper">

                    <div class="donut-chart"></div>

                    <div class="donut-center">

                        <div class="donut-total">
                            {{ $totalKaryawan }}
                        </div>

                        <div class="donut-total-label">
                            Karyawan
                        </div>

                    </div>

                </div>


                <div class="category-legend">

                    <div class="category-legend-title">
                        Distribusi Pencapaian Kinerja
                    </div>


                    {{-- BAIK --}}

                    <div class="category-legend-item">

                        <div class="category-legend-left">

                            <span class="category-legend-dot good"></span>

                            <span class="category-legend-label">
                                Pencapaian Baik
                            </span>

                        </div>


                        <div class="category-legend-value">

                            {{ $nilaiBaik }}

                            <span class="category-legend-percent">

                                ({{ number_format(
                                    $persenBaik,
                                    0,
                                    ',',
                                    '.'
                                ) }}%)

                            </span>

                        </div>

                    </div>


                    {{-- SEDANG --}}

                    <div class="category-legend-item">

                        <div class="category-legend-left">

                            <span class="category-legend-dot medium"></span>

                            <span class="category-legend-label">
                                Pencapaian Sedang
                            </span>

                        </div>


                        <div class="category-legend-value">

                            {{ $nilaiSedang }}

                            <span class="category-legend-percent">

                                ({{ number_format(
                                    $persenSedang,
                                    0,
                                    ',',
                                    '.'
                                ) }}%)

                            </span>

                        </div>

                    </div>


                    {{-- RENDAH --}}

                    <div class="category-legend-item">

                        <div class="category-legend-left">

                            <span class="category-legend-dot low"></span>

                            <span class="category-legend-label">
                                Pencapaian Rendah
                            </span>

                        </div>


                        <div class="category-legend-value">

                            {{ $nilaiRendah }}

                            <span class="category-legend-percent">

                                ({{ number_format(
                                    $persenRendah,
                                    0,
                                    ',',
                                    '.'
                                ) }}%)

                            </span>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- =========================================================
         STATUS EVALUASI
    ========================================================== --}}

    @php

        $totalKaryawanDashboard =
            (int) $totalKaryawan;

        $totalMonitoringDashboard =
            (int) $totalMonitoring;

        $persentaseEvaluasi =
            $totalKaryawanDashboard > 0

                ? min(
                    (
                        $totalMonitoringDashboard /
                        $totalKaryawanDashboard
                    ) * 100,
                    100
                )

                : 0;

    @endphp


    <div class="evaluation-status-card">

        <div class="evaluation-status-header">

            <div class="evaluation-status-title-wrapper">

                <div class="evaluation-status-icon">
                    📊
                </div>

                <div>

                    <h2 class="evaluation-status-title">
                        Status Evaluasi Kinerja
                    </h2>

                    <p class="evaluation-status-subtitle">
                        Progres monitoring kinerja karyawan pada periode berjalan.
                    </p>

                </div>

            </div>


            <div class="evaluation-period-badge">
                Semester 1 · 2026
            </div>

        </div>


        <div class="evaluation-status-content">


            <div>

                <div class="evaluation-label">
                    Karyawan yang telah dimonitoring
                </div>

                <div class="evaluation-number">

                    {{ $totalMonitoringDashboard }}

                    <span>
                        / {{ $totalKaryawanDashboard }}
                    </span>

                </div>

                <div class="evaluation-description">
                    Dari total {{ $totalKaryawanDashboard }} karyawan terdaftar
                </div>

            </div>


            <div class="evaluation-progress-section">

                <div class="evaluation-progress-header">

                    <span>
                        Progres Evaluasi
                    </span>

                    <strong>
                        {{ number_format(
                            $persentaseEvaluasi,
                            2,
                            ',',
                            '.'
                        ) }}%
                    </strong>

                </div>


                <div class="evaluation-progress-background">

                    <div
                        class="evaluation-progress-bar"
                        data-progress="{{ $persentaseEvaluasi }}">
                    </div>

                </div>


                <div class="evaluation-progress-info">

                    <span>
                        {{ $totalMonitoringDashboard }} selesai
                    </span>

                    <span>

                        {{ max(
                            $totalKaryawanDashboard -
                            $totalMonitoringDashboard,
                            0
                        ) }}

                        belum dimonitoring

                    </span>

                </div>

            </div>


            <div class="evaluation-status-badge-wrapper">

                @if($persentaseEvaluasi >= 80)

                    <div class="evaluation-status-badge evaluation-complete">
                        ✓ Evaluasi Baik
                    </div>

                @elseif($persentaseEvaluasi > 0)

                    <div class="evaluation-status-badge evaluation-progress">
                        ● Sedang Berjalan
                    </div>

                @else

                    <div class="evaluation-status-badge evaluation-not-started">
                        ○ Belum Dimulai
                    </div>

                @endif

            </div>

        </div>

    </div>


    {{-- =========================================================
         MONITORING TERBARU
    ========================================================== --}}

    <div class="dashboard-card">

        <div class="card-header">

            <div class="card-title-wrapper">

                <div class="card-title-icon">
                    📋
                </div>

                <div>

                    <h2 class="card-title">
                        Monitoring Terbaru
                    </h2>

                    <p class="card-subtitle">
                        Ringkasan monitoring kinerja terbaru.
                    </p>

                </div>

            </div>


            <div class="card-badge">
                Monitoring
            </div>

        </div>


        @if($monitoringTerbaru->count() > 0)

            <div class="table-wrapper">

                <table class="monitoring-table">

                    <thead>

                        <tr>

                            <th>
                                No
                            </th>

                            <th>
                                Karyawan
                            </th>

                            <th>
                                Goals
                            </th>

                            <th class="center">
                                Target
                            </th>

                            <th class="center">
                                Realisasi
                            </th>

                            <th class="center">
                                Pencapaian
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @foreach($monitoringTerbaru as $index => $monitoring)

                            @php

                                $persentase =
                                    (float) $monitoring->persentase;


                                if ($persentase >= 80) {

                                    $badgeClass =
                                        'achievement-good';

                                } elseif ($persentase >= 50) {

                                    $badgeClass =
                                        'achievement-medium';

                                } else {

                                    $badgeClass =
                                        'achievement-low';

                                }


                                $nama =
                                    $monitoring->karyawan->nama ?? '-';


                                $initial =
                                    strtoupper(
                                        substr($nama, 0, 1)
                                    );

                            @endphp


                            <tr>

                                <td class="number-cell">
                                    {{ $index + 1 }}
                                </td>


                                <td>

                                    <div class="employee-wrapper">

                                        <div class="employee-avatar">
                                            {{ $initial }}
                                        </div>

                                        <div class="employee-name">
                                            {{ $nama }}
                                        </div>

                                    </div>

                                </td>


                                <td>

                                    <div class="goal-name">

                                        {{ $monitoring->goal->nama_goal ?? '-' }}

                                    </div>

                                </td>


                                <td class="center">

                                    {{ number_format(
                                        $monitoring->target,
                                        2,
                                        ',',
                                        '.'
                                    ) }}

                                </td>


                                <td class="center">

                                    {{ number_format(
                                        $monitoring->realisasi,
                                        2,
                                        ',',
                                        '.'
                                    ) }}

                                </td>


                                <td class="center">

                                    <span class="achievement-badge {{ $badgeClass }}">

                                        <span>
                                            ●
                                        </span>

                                        {{ number_format(
                                            $persentase,
                                            2,
                                            ',',
                                            '.'
                                        ) }}%

                                    </span>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>


        @else

            <div class="empty-data">

                <div class="empty-icon">
                    📊
                </div>

                <div class="empty-title">
                    Belum ada data monitoring.
                </div>

            </div>

        @endif

    </div>


    {{-- =========================================================
         GRAFIK PENCAPAIAN
    ========================================================== --}}

    <div class="dashboard-card">

        <div class="card-header">

            <div class="card-title-wrapper">

                <div class="card-title-icon">
                    📈
                </div>

                <div>

                    <h2 class="card-title">
                        Grafik Pencapaian Kinerja
                    </h2>

                    <p class="card-subtitle">
                        Perbandingan target, realisasi, dan pencapaian.
                    </p>

                </div>

            </div>


            <div class="card-badge">
                Performance
            </div>

        </div>


        @if($monitorings->count() > 0)

            @foreach($monitorings as $monitoring)

                @php

                    $persentase =
                        (float) $monitoring->persentase;


                    $nilaiBar =
                        min(
                            max(
                                $persentase,
                                0
                            ),
                            100
                        );


                    if ($persentase >= 80) {

                        $warnaClass =
                            'graph-good';

                    } elseif ($persentase >= 50) {

                        $warnaClass =
                            'graph-medium';

                    } else {

                        $warnaClass =
                            'graph-low';

                    }


                    $namaKaryawan =
                        $monitoring->karyawan->nama ?? '-';


                    $namaGoal =
                        $monitoring->goal->nama_goal ?? '-';

                @endphp


                <div class="graph-item">

                    <div class="graph-header">

                        <div>

                            <div class="graph-employee">
                                {{ $namaKaryawan }}
                            </div>

                            <div class="graph-goal">
                                {{ $namaGoal }}
                            </div>

                        </div>


                        <div class="graph-percentage {{ $warnaClass }}">

                            {{ number_format(
                                $persentase,
                                2,
                                ',',
                                '.'
                            ) }}%

                        </div>

                    </div>


                    <div class="graph-bar-background">

                        <div
                            class="graph-bar {{ $warnaClass }}"
                            data-width="{{ $nilaiBar }}"
                        ></div>

                    </div>


                    <div class="graph-info">

                        <span>

                            Target:

                            <strong>

                                {{ number_format(
                                    $monitoring->target,
                                    2,
                                    ',',
                                    '.'
                                ) }}

                            </strong>

                        </span>


                        <span>

                            Realisasi:

                            <strong>

                                {{ number_format(
                                    $monitoring->realisasi,
                                    2,
                                    ',',
                                    '.'
                                ) }}

                            </strong>

                        </span>

                    </div>

                </div>


            @endforeach


        @else

            <div class="empty-data">

                <div class="empty-icon">
                    📊
                </div>

                <div class="empty-title">
                    Belum ada data untuk grafik.
                </div>

            </div>

        @endif

    </div>


</div>


<script>

document.addEventListener('DOMContentLoaded', function () {


    /* =====================================================
       GRAFIK PENCAPAIAN
    ====================================================== */

    const bars =
        document.querySelectorAll('.graph-bar');


    bars.forEach(function (bar) {

        const width =
            bar.getAttribute('data-width');


        setTimeout(function () {

            bar.style.width =
                width + '%';

        }, 150);

    });


    /* =====================================================
       PROGRESS EVALUASI
    ====================================================== */

    const progressBar =
        document.querySelector(
            '.evaluation-progress-bar'
        );


    if (progressBar) {

        const progress =
            progressBar.getAttribute(
                'data-progress'
            );


        setTimeout(function () {

            progressBar.style.width =
                progress + '%';

        }, 150);

    }


    /* =====================================================
       ANIMASI TREN
    ====================================================== */

    const trendBars =
        document.querySelectorAll('.trend-bar');


    trendBars.forEach(function (bar) {

        const item =
            bar.closest('.trend-item');


        if (!item) {
            return;
        }


        const value =
            item.style
                .getPropertyValue('--trend-value');


        bar.style.height = '0px';


        setTimeout(function () {

            bar.style.height =
                'calc(' +
                value +
                ' * 1.85px)';

        }, 150);

    });

});

</script>


</x-app-layout>