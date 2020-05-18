'use strict'

import axios from 'axios'

const formatter = new Intl.NumberFormat('en-US', {
  style: 'currency',
  currency: 'USD',
  minimumFractionDigits: 2
})

const num = new Intl.NumberFormat('en-US', {
  style: 'decimal',
  maximumFractionDigits: 0,
  useGrouping: true
})

const loc = window.location.href
axios.get(loc + '/dist/data/forbes.json')
  .then(({data}) => {

    // Sort the full list in order of Net Worth
    data.sort(compare);

    // Grab only the top 100 billionaires
    const top100 = data.slice(0, 100)

    // Sum the Net Worth of the top 100 billionaires
    const total = top100.reduce((acc, person) => {
      const worth = typeof person.realTimeWorth === 'undefined' ? person.worth : person.realTimeWorth
      return acc + worth 
    },0)

    const response = {}
    response.total = total
    response.top = top100
    return response
  })
  .then( ({top, total}) => {

    // Set variables for richest person
    const topWorth = typeof top[0].realTimeWorth === 'undefined' ? top[0].worth * 1000000 : top[0].realTimeWorth * 1000000
    const topName = top[0].name
    const gender2 = top[0].gender === 'M' ? 'he' : 'she'
    const gender1 = top[0].gender === 'M' ? 'his' : 'her'


    // Iterate through and insert the richest person's name
    const nameElements = document.getElementsByClassName('name')
    const nameArray = Array.prototype.slice.call(nameElements)
    nameArray.map(el => {
      el.innerHTML = topName
    })

    document.getElementById('total').innerHTML = Math.round(total) / 1000000
    document.getElementById('full').innerHTML = formatter.format(total * 1000000)
    document.getElementById('topworth').innerHTML = formatter.format(topWorth)
    document.getElementById('gender2').innerHTML = gender2
    document.getElementById('gender1').innerHTML = gender1
    document.getElementById('body-container').style.display = 'block'
    document.getElementById('loader').style.display = 'none'

    document.getElementById('submit-form').onclick = (e) => {
      e.preventDefault()
      const yearly = document.getElementById('yearly-income').value
      if( yearly === '' ) return
      const currency = document.getElementById('currency')
      const cur = currency.options[currency.selectedIndex].value

      axios.get(loc + '/dist/data/currency.json')
      .then(({data}) => {
        const rate = Object.entries(data.rates)
          .filter((entry) =>{
            return entry[0] === cur
          })
        const income = yearly / rate[0][1]
        const years = Math.round(1000000 / income)
        const yearsNetWorth = num.format((topWorth)/income)
        const numyears = (topWorth) / (income * 365)
        document.getElementById('you-years1').innerHTML = years
        document.getElementById('you-networth').innerHTML = yearsNetWorth
        document.getElementById('numyears').innerHTML = num.format(numyears) + ' years '
        document.getElementById('poor').style.display = "block"
        document.getElementById('poor').scrollIntoView()
      })
    }
  })
  
  const  compare = (a,b) => {
    const worthA = typeof a.realTimeWorth === 'undefined' ? a.worth : a.realTimeWorth
    const worthB = typeof b.realTimeWorth === 'undefined' ? b.worth : b.realTimeWorth
    if (worthA < worthB)
      return 1;
    if (worthA > worthB)
      return -1;
    return 0;
  }