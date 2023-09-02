luxon.Settings.defaultLocale = "fi";

var numberElements = 200;
var updateCount = 0;
var lineColour = '#c82333';
Chart.defaults.color = '#FFF';

var commonOptions = {
  parsing: false,
  // animation: false,
  color: '#FFF',
  plugins: {
    decimation: {
      enabled: true,
      algorithm: 'lttb',
      samples: 100,
      threshold: 100,
    },
    title: {
      display: false,
      fontSize: 20,
    },
    legend: {display: false},
    tooltips:{
      enabled: true
    },
  },

  scales: {
    x: {
      type: 'time',
      time: {
        unit: 'second',
        displayFormats: {
          millisecond: 'h:mm:ss',
          second: 'h:mm:ss',
        },
      },
      ticks: {
        autoSkip: true,
        autoSkipPadding: 10,
        maxRotation: 0
      },
      grid: {
        color: '#FFFFFF'
      },
    },

    y: {
      beginAtZero:true,
      grid: {
        color: '#FFFFFF'
      }
    },
  },
  backgroundColor: "transparent",
  animation: {
    duration: 0 // general animation time
  },

  hover: {
    animationDuration: 0 // duration of animations when hovering an item
  },

  responsiveAnimationDuration: 0, // animation duration after a resize
  elements: {
    line: {
      tension: 0, // disables bezier curves 
    }
  },
};
