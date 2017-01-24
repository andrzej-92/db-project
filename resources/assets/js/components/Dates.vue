<template>
  <div class="container-fluid">
    <div class="row" v-for="chartData, key in chartsDataSets">
        <line-chart :chartData=chartData.data :title=chartData.year />
    </div>
  </div>
</template>

<script>
  import LineChart from './charts/Line.vue';

  export default {

    components: { LineChart },

    data() {
      return {
        all: {
          title: 'Wartość sprzedaży względem okresów czasu'
        },
        chartsDataSets: []
      }
    },

    mounted () {
      this.loadChartData();
    },

    methods: {
      loadChartData () {
        this.$http.get('/api/charts/dates')
          .then(response => {
            return response.body;
          })
          .then(data => {

            return data.all;
          })
          .then((data) => {

            let dataSets = [];
            let labels = [];
            let monthsLabels = [
              'Styczeń',
              'Luty',
              'Marzec',
              'Kwiecień',
              'Maj',
              'Czerwiec',
              'Lipiec',
              'Sierpień',
              'Wrzesień',
              'Październik',
              'Listopad',
              'Grudzień',
            ];

            $.each(data.years, (index, year) => {
              let bruttoSet = [];
              let ticketSet = [];
              let dataSetLabel = [];

              $.each(year, (index, month) => {
                if (index != 'ALL') {
                  bruttoSet.push(month.brutto);
                  //ticketSet.push(month.ticket_count);
                  dataSetLabel.push(monthsLabels[index-1]);
                }
              });

              if (index != 'ALL') {
                dataSets.push({
                  year: index,
                  data: {
                    labels: dataSetLabel,
                    datasets: [
                      {
                        label: "Wartosc brutto",
                        data:  bruttoSet
                      }
                    ]
                  }
                });
              }

              this.chartsDataSets = dataSets;
            });
          });
      }
    }
  }
</script>
