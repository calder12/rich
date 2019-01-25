<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>How Poor are You?</title>
  <link rel="stylesheet" href="./dist/app.css">
</head>
<body>
  <section class="section">
    <div class="container">
      <h1 class="title">
        The Rich get Richer
      </h1>
      <div id="loader" class="loader">Loading...</div>
      <div id="body-container">
        <p>According to the Forbes 400 the richest 100 people in the world have a combined net worth of <span id="total"></span> trilion dollars. <strong>TRILLION</strong>, that is 12 zeros people. Written out in full that is <span id="full"></span> The list has <span class="name"></span> listed as the richest person in the world with a net worth of <span id="topworth"></span></p>
        <p>That number is so high it is difficult for most people to fathom so let's put it in perspective shall we?</p>
        <hr>
        <h2 class="title is-4">How poor are you compared to <span class="name"></span>?</h2>
        <form>
          <div class="field">
            <label class="label">Yearly Income</label>
            <div class="control">
              <input class="input" type="number" placeholder="Enter your gross yearly income" id="yearly-income">
            </div>
          </div>
          <div class="field">
            <label class="label">Currency</label>
            <div class="control">
              <div class="select">
                <select id="currency">
                  <option value="USD">USD</option>
                  <option value="CAD">CAD</option>
                  <option value="GBP">GBP</option>
                  <option value="EUR">EUR</option>
                  <option value="AUD">AUD</option>
                </select>
              </div>
            </div>
          </div>
          <div class="field is-grouped">
            <div class="control">
              <button id="submit-form" class="button is-link">Submit</button>
            </div>
          </div>
        </form>
        <div class="center results" id="poor">
          <h3 class="title is-5 mt-4">It would take you <span class="earn" id="you-years1"></span> years to earn one million dollars US</h3>
          <h3 class="title is-5">It would take you <span class="earn" id="you-networth"></span> years to earn <span class="name"></span>'s net worth.</h3>
          <h3 class="title is-5"><span class="name"></span> could spend what you make in a year, every day for <span id="numyears" class="earn"></span> before spending <span id="gender1"></span> net worth, and that assumes <span id="gender2"></span> never makes another penny.</h3>
        </div>
      </div>
    </div>
  </section>
  <script src="./dist/app.js"></script>
</body>
</html>