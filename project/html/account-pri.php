<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
  <!-- production version of vue... -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/vue"></script> -->
  <link rel="stylesheet" href="../assets/styles/layout.css">
  <title>Document</title>
</head>
<style>
  body {
    margin: 0;
  }
  @font-face {
    font-family: quickSand;
    src:  url('../assets/fonts/Quicksand-Regular.ttf');
  }
  #acc-pri, h1, h2, h3, h4, h5, h6, p {
    font-family: quickSand;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    /* text-align: center; */
    color: #2d2d2d;
    height: 100%;
    background-image: url('../assets/img/insights.jpg');
    background-position: center;
    background-size: cover;
  }
  .account-prioritisation {
    height: 100%;
    display: flex;
    align-items: center;
    margin: 0 4rem;
  }
  .list {
    height: 650px;
    overflow-x: hidden;
    overflow-y: scroll;
    background-color: white;
    box-shadow: 5px 5px 8px #00000052;
    padding: .5rem;
    min-width: 330px;
    margin-right: .5rem;
    margin-left: 1rem;
    font-size: 1.3rem;
  }
  .chart {
    height: 650px;
    background-color: white;
    box-shadow: 5px 5px 8px #00000052;
    position: relative;
    overflow-y: hidden;
    overflow-x: scroll;
    padding: 0 .5rem 6rem .5rem;
    margin-right: .5rem;
    margin-left: .5rem;
    min-width: 330px; 
    width: 100%;
  }
  .control-wrapper {
    /* width: 100%; */
    padding-right: 1rem;
    padding-left: .5rem;
    height: 650px;
  }
  .controls {
    position: relative;
    height: 650px;
    display: none;
  }
  .controls input {
    transform: rotate(-90deg);
    position: absolute;
    top: 266px;
    left: -285px;
    width: 567px;
  }
  .key-wrapper {
    /*padding: 0.5rem;*/
    padding-top: .5rem;
    padding-bottom: .5rem;
    transition: all 1s;
    /*height: 284px;*/
    width: 172px;
    background-color: white;
    box-shadow: 5px 5px 8px #00000052;
  }
  .key {
    margin-bottom: .5rem;
    /*margin-top: .5rem;*/
    text-transform: uppercase;
    display: flex;
    align-items: center;
    justify-content: flex-end;
    text-align: right;
    color: #2d2d2d;
    height: 35px;
    font-size: 0.9rem;
    padding-left: .5rem;
    padding-right: .5rem;
  }
  .key:hover {
    cursor: pointer;
  }
  .color-block {
    min-width: 5px;
    height: 30px;
    margin-left: 1rem;
    border-radius: 5px;
  }
  .brand {
    background-color: #2cd267;
  }
  .flesh-pink {
    background-color: #ca5b5b;
  }
  .purple {
    background-color: #7C56B7;
  }
  .blue {
    background-color: #3b8ecc;
  }
  .mustard-yellow {
    background-color: #ECCA44;
  }
  .blue-pastel {
    background-color: #62C8BF;
  }
  .grey {
    background-color: #2f2f2f;
  }
  .more-grey {
    background-color: #272727;
  }
  .greyed-out {
    color: #6b6b6b;
  }
  .light-grey {
    background-color: #d2d2d2;
  }
  .bar-wrapper {
    display: flex;
    align-items: flex-end;
    height: 100%;
    position: relative;
  }
  .big-bar {
    position: absolute;
    width: 96px;
    height: 100px;
    transition: height 1s;
  }
  .divider {
    width: 96px;
    height: 2px;
    position: absolute;
    z-index: 0;
    bottom: 50%;
    transition: all 1s;
  }
  .account-wrapper {
    position: relative;
    height: 100%;
    display: flex;
    align-items: flex-end;
    margin-right: .5rem;
    margin-left: .5rem;
    transition: background-color 1s;
    /*min-width: 192px;*/
  }
  .bar {
    transition: all 1s;
    min-width: 16px;
    z-index: 1;
    pointer-events: none;
  }
  .account {
    position: absolute;
    top: 558px;
    font-size: 1rem;
    width: 200px;
    color: white;
    width: 90px;
  }
  .big-bar:hover, .account:hover, .account-item:hover {
    cursor: pointer;
  }
  .details {
    position: absolute;
    left: 114px;
    font-size: .7em;
    bottom: -14px;
  }
  .tag {
    padding: .5rem;
    color: white;
    margin-top: -0.6rem;
  }
</style>
<body>
  <div id="acc-pri" cloak>

    <div class="account-prioritisation" :style="windowHeight()">
      <div class="list">
        <div :v-bind="index" class="account-item" v-for="(item, index) in sortAccounts">
          <span v-on:click="selectAccount(item.name)" :style="filterColor(item.name)">
            {{ item.name }}
          </span>
        </div>
      </div>

      <div id="chart" class="chart">
        <div class="bar-wrapper">
          <div 
          class="account-wrapper" 
          :style="switchStyles((selectedAccounts.length === 0), 'min-width', '96px', '330px')" 
          v-for="(account, index) in filterAccounts">
            <div 
            v-on:click="detail = !detail" 
            class="bar" 
            :style="barDetail(account, 'bigData', '#2cd267', '#53d35a')">
            </div>
            <div 
            v-on:click="detail = !detail" 
            class="bar" 
            :style="barDetail(account, 'dataManagement', '#2cd267', '#7C56B7')">
            </div>
            <div 
            v-on:click="detail = !detail" 
            class="bar" 
            :style="barDetail(account, 'dataAnalytics', '#2cd267', '#62C8BF')">
            </div>
            <div 
            v-on:click="detail = !detail" 
            class="bar" 
            :style="barDetail(account, 'machineLearning', '#2cd267', '#ECCA44')">
            </div>
            <div 
            v-on:click="detail = !detail" 
            class="bar" 
            :style="barDetail(account, 'deepLearning', '#2cd267', '#ca5b5b')">
            </div>
            <div 
            v-on:click="detail = !detail" 
            class="bar" 
            :style="barDetail(account, 'ai', '#2cd267', '#3b8ecc')">
            </div>

            <div 
            :ref="index" 
            v-on:click="focusAccount(account.total, account.name)" 
            class="account"
            :style="switchStyles((selected === account.name), 'color', '#2cd267', '#2d2d2d')"
            >{{ account.name }}
            </div>
            <div v-on:click="focusAccount(account.total, account.name)" class="big-bar" :style="barDetail(account, 'total', '#d2d2d2', '#d2d2d2')"></div>
            <div :style="{
              backgroundColor: (detail ? '#bdbdbd' : '#bdbdbd'),
              bottom: medianHeight+'%',
            }" class="divider"></div>
            <div class="details" v-if="(selectedAccounts.length > 0)">
              <div class="tag light-grey">Total:                {{ account.total }}</div><br>
              <div class="tag brand">Big Data:                  {{ account.bigData }}</div><br>
              <div class="tag purple">Data Management:          {{ account.dataManagement }}</div><br>
              <div class="tag blue-pastel">Data Analytics:      {{ account.dataAnalytics }}</div><br>
              <div class="tag mustard-yellow">Machine Learning: {{ account.machineLearning }}</div><br>
              <div class="tag flesh-pink">Deep Learning:        {{ account.deepLearning }}</div><br>
              <div class="tag blue">AI:                         {{ account.ai }}</div><br>
            </div>
          </div>
        </div>
      </div>

      <div class="controls">
        <input type="range" min="0" max="100" step="1" value="50" v-model="medianHeight">
      </div>

      <div class="control-wrapper">
        <div class="key-wrapper">
          <div class="key" :class="(sortByType === 'total') ? 'light-grey' : ''" v-on:click="sortByType = 'total'">
            Total
            <div class="color-block light-grey"></div>
          </div>
          <div class="key" :class="(sortByType === 'bigData') ? 'light-grey' : ''" v-on:click="sortByType = 'bigData'">
            Big Data
            <div class="color-block brand"></div>
          </div>
          <div class="key" :class="(sortByType === 'dataManagement') ? 'light-grey' : ''" v-on:click="sortByType = 'dataManagement'">
            Data Management
            <div class="color-block purple"></div>
          </div>
          <div class="key" :class="(sortByType === 'dataAnalytics') ? 'light-grey' : ''" v-on:click="sortByType = 'dataAnalytics'">
            Data Analytics
            <div class="color-block blue-pastel"></div>
          </div>
          <div class="key" :class="(sortByType === 'machineLearning') ? 'light-grey' : ''" v-on:click="sortByType = 'machineLearning'">
            Machine Learning
            <div class="color-block mustard-yellow"></div>
          </div>
          <div class="key" :class="(sortByType === 'deepLearning') ? 'light-grey' : ''" v-on:click="sortByType = 'deepLearning'">
            Deep Learning
            <div class="color-block flesh-pink"></div>
          </div>
          <div class="key" :class="(sortByType === 'ai') ? 'light-grey' : ''" v-on:click="sortByType = 'ai'">
            AI
            <div class="color-block blue"></div>
          </div>
        </div>
      </div>
    </div>

  </div>
</body>
<!-- 
  For now we have a data.json file with the account data
  This will eventually be pulled in from the platform...
 -->
<?php $data = file_get_contents('./data.json'); ?>
<script>
  // Convert the data to a javascript var
  const accountsSrc = <?php echo $data; ?>;

  var accPri = new Vue({
    el: '#acc-pri',
    beforeMount() {
      // Then we can just add it to the vue instance
      this.accounts = accountsSrc;
    },
    mounted() {
      this.chart = document.getElementById('chart');
      this.barWrap = this.chart.getElementsByClassName('bar-wrapper')[0];
      this.bars = this.chart.getElementsByClassName('bar');
      this.max = this.accounts[0].total;
      this.selected = this.accounts[0].name;

      setTimeout(() => {
        this.detail = !this.detail;
      }, 1);
    },
    data: {
      accounts: [],
      sortByType: 'total',
      max: null,
      detail: false,
      selected: '',
      selectedAccounts: [],
      medianHeight: 50
    },
    computed: {
      filterAccounts() {
        if(this.selectedAccounts.length === 0) {
          return this.accounts;
        } else {
          let result = [];
          for(let i = 0; i < this.selectedAccounts.length; i++) {
            for(let k = 0; k < this.accounts.length; k++) {
              if(this.selectedAccounts[i] === this.accounts[k].name) {
                result.push(this.accounts[k]);
              }
            }
          }
          return this.sorter(result);
        } 
      },
      sortAccounts() {
        return this.sorter(this.accounts);
      }
    },
    methods: {
      switchStyles(condition, selection, ifTrue, ifFalse) {
        return selection + ': ' + (condition ? ifTrue : ifFalse);
      },
      sorter(arr) {
        return arr.sort((a, b) => {
          return b[this.sortByType] - a[this.sortByType];
        });
      },
      filterColor(name) {
        let color;
        if(name === this.selected) {
          color = '#53d35a';
        } else {
          color = '#2d2d2d';
        }
        if(this.selectedAccounts.length === 0) {
          return 'color: '+color;
        } else {
          for(let i = 0; i < this.selectedAccounts.length; i++) {
            if(name === this.selectedAccounts[i]) {
              return 'color: '+color;
            }
          }
          return 'color: #ababab;';
        }
      },
      selectAccount(name) {
        let index = this.selectedAccounts.findIndex(item => item === name);
        if(index === -1) {
          this.selectedAccounts.push(name);
        } else {
          this.selectedAccounts.splice(index, 1)
        }
      },
      windowHeight() {
        return 'height: ' + window.innerHeight + 'px';
      },
      findPercent(num) {
        return ((num * this.medianHeight) / this.max) + '%';
      },
      focusAccount(num, name) {
        this.selected = name;
        this.max = num;
      },
      barDetail(account, type, colorOne, colorTwo) {
        return {
          height: this.findPercent((this.detail ? account[type] : account.total)),
          backgroundColor: (this.detail ? colorTwo : colorOne)
        }
      }
    }
  })
</script>
</html>