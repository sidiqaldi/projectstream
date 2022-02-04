<div>
    {{ $team->name }}
    <div class="p-1 mx-5 md:mx-10 bg-white">
        @if($projects->count())
            <div id="chart"></div>
        @else
            <div>No project</div>
        @endif
    </div>
</div>

@if($projects->count())
@push('scripts')
<script src="{{ asset('js/apexcharts.js') }}"></script>
<script>
    var options = {
        series: [
            {data: @js($timeline)}
        ],
        chart: {
            height: 350,
            type: 'rangeBar',
            events: {
                dataPointSelection: function(event, chartContext, opts) {
                    let existData = opts.w.config.series[0].data[opts.dataPointIndex];

                    if (!existData) return;

                    let text = `Goto ${existData.x} ?`;

                    if (window.confirm(text)) {
                        return window.open(existData.url);
                    }
                },
            }
        },
        plotOptions: {
                bar: {
                horizontal: true
            }
        },
        xaxis: {
            type: 'datetime'
        },
    };

    var chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();

</script>
@endpush
@endif