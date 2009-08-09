            var vChart0 = new Visifire2('libraries/visifire/SL.Visifire.Charts.xap', "MyChart0", 500, 300);
            
            // vChart1.setLogLevel(0); // If you want to disable logging.
            
            // Chart Data XML
            var chartXml = '<vc:Chart xmlns:vc="clr-namespace:Visifire.Charts;assembly=SLVisifire.Charts" Width="500" Height="300" BorderThickness="0.5" Padding="3" View3D="True" BorderBrush="Gray" ScrollingEnabled="False">'
               + '     <vc:Chart.Titles>'
               + '         <vc:Title Text="Visifire DateTime Axis Chart"/>'
               + '     </vc:Chart.Titles>'
	       + '     <vc:Chart.AxesX>'
               + '         <vc:Axis IntervalType="Days" Interval="20"/>'
               + '     </vc:Chart.AxesX>'
               + '     <vc:Chart.Legends>'
	       + '         <vc:Legend Enabled="False"/>'
               + '     </vc:Chart.Legends>'	
               + '     <vc:Chart.Series>'
               + '         <vc:DataSeries RenderAs="Column" XValueType="DateTime">'
               + '             <vc:DataSeries.DataPoints>'
               + '                 <vc:DataPoint XValue="1/2/2008" YValue="220"/>'
               + '                 <vc:DataPoint XValue="2/4/2008" YValue="450"/>'
               + '                 <vc:DataPoint XValue="3/2/2008" YValue="550"/>'
               + '                 <vc:DataPoint XValue="4/11/2008" YValue="650"/>'
               + '                 <vc:DataPoint XValue="5/1/2008" YValue="620"/>'
	       + '                 <vc:DataPoint XValue="6/10/2008" YValue="446"/>'
               + '             </vc:DataSeries.DataPoints>'
               + '         </vc:DataSeries>'
               + '         <vc:DataSeries RenderAs="Column" XValueType="DateTime">'
               + '             <vc:DataSeries.DataPoints>'
               + '                 <vc:DataPoint XValue="1/2/2008" YValue="330"/>'
               + '                 <vc:DataPoint XValue="2/4/2008" YValue="400"/>'
               + '                 <vc:DataPoint XValue="3/2/2008" YValue="653"/>'
               + '                 <vc:DataPoint XValue="4/11/2008" YValue="756"/>'
               + '                 <vc:DataPoint XValue="5/1/2008" YValue="545"/>'
	       + '                 <vc:DataPoint XValue="6/10/2008" YValue="334"/>'
               + '             </vc:DataSeries.DataPoints>'
               + '         </vc:DataSeries>'
               + '     </vc:Chart.Series>'
               + ' </vc:Chart>';

            // Set Chart Data XML
            vChart0.setDataXml(chartXml);

            // Render chart
            vChart0.render("VisifireChart0");