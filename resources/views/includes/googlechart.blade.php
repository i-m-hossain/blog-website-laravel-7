

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawStuff);

        function drawStuff() {
            var data = new google.visualization.arrayToDataTable([
                ['Content', 'Number'],
                ["Published Posts", {{$post_count}}],
                ["Trashed Posts", {{$trash_count}}],
                ["Users",  {{$user_count}}],

                ["Category", {{$category_count}} ],

            ]);

            var options = {
                width: 800,
                legend: { position: 'none' },
                chart: {
                    title: 'Number of contents',
                    subtitle: 'Height with respect to number of contents' },
                axes: {
                    x: {
                        0: { side: 'top', label: 'Contents'} // Top x-axis.
                    }
                },
                bar: { groupWidth: "90%" }
            };

            var chart = new google.charts.Bar(document.getElementById('chart'));
            // Convert the Classic options to Material options.
            chart.draw(data, google.charts.Bar.convertOptions(options));
        };
    </script>

 <div id="chart" style="width: 800px; height: 600px;"></div>

