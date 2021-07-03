<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MyLife</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/logo1_1.png') }}" />
    <style>
        @font-face {
  font-family: 'Open Sans';
  font-style: normal;
  font-weight: 300;
  src: url(https://fonts.gstatic.com/s/opensans/v20/mem5YaGs126MiZpBA-UN_r8OUuhs.ttf) format('truetype');
}
*,
*:before,
*:after {
  -webkit-box-sizing: border-box;
  -mox-box-sizing: border-box;
  box-sizing: border-box;
}
body,
html {
  background: #111;
  width: 100%;
  height: 100%;
  overflow: hidden;
}
.canvas {
  width: 100%;
  height: 100%;
  clear: both;
  overflow: hidden;
  z-index: -1;
}
.star {
  position: absolute;
  opacity: 1;
  width: 5px;
  height: 5px;
  border-radius: 50%;
  background: #00f6ff;
  -webkit-box-shadow: 0 0 5px rgba(0, 246, 255, 0.75);
  -moz-box-shadow: 0 0 5px rgba(0, 246, 255, 0.75);
  box-shadow: 0 0 5px rgba(0, 246, 255, 0.75);
}
.streak {
  width: 10px;
  height: 150px;
  background: #fff;
  border-radius: 100%;
  position: relative;
  top: 100px;
  left: 100px;
  -webkit-box-shadow: 0 0 25px rgba(255, 255, 255, 0.75);
  box-shadow: 0 0 25px rgba(255, 255, 255, 0.75);
  -webkit-transform: rotate(-135deg);
  -moz-transform: rotate(-135deg);
  -ms-transform: rotate(-135deg);
  -o-transform: rotate(-135deg);
  transform: rotate(-135deg);
  background: -moz-linear-gradient(top, #ffffff 0%, rgba(255, 255, 255, 0.75) 25%, rgba(255, 255, 255, 0) 100%);
  background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #ffffff), color-stop(25%, #ffffff), color-stop(100%, rgba(255, 255, 255, 0)));
  background: -webkit-linear-gradient(top, #ffffff 0%, rgba(255, 255, 255, 0.75) 25%, rgba(255, 255, 255, 0) 100%);
  background: -o-linear-gradient(top, #ffffff 0%, rgba(255, 255, 255, 0.75) 25%, rgba(255, 255, 255, 0) 100%);
  background: -ms-linear-gradient(top, #ffffff 0%, rgba(255, 255, 255, 0.75) 25%, rgba(255, 255, 255, 0) 100%);
  background: linear-gradient(to bottom, #ffffff 0%, rgba(255, 255, 255, 0.75) 25%, rgba(255, 255, 255, 0) 100%);
}
.cosmic-container {
  position: relative;
  width: 97px;
  height: 97px;
  margin: 75px auto 0;
}
.cosmic-container > div {
  position: absolute;
  background-position: no-repeat;
}
.c-green,
.c-red {
  background-image: url("https://assets.codepen.io/54887/c-green.png");
  width: 80px;
  height: 97px;
  left: -230px;
  z-index: 6;
}
.o-orange {
  background-image: url("https://assets.codepen.io/54887/o-orange.png");
  width: 97px;
  height: 97px;
  left: -140px;
  z-index: 5;
}
.s-pink {
  background-image: url("https://assets.codepen.io/54887/s-pink.png");
  width: 87px;
  height: 97px;
  left: -40px;
  z-index: 4;
}
.m-mint {
  background-image: url("https://assets.codepen.io/54887/m-mint.png");
  width: 130px;
  height: 97px;
  left: 30px;
  z-index: 3;
}
.i-orange {
  background-image: url("https://assets.codepen.io/54887/i-orange.png");
  width: 32px;
  height: 97px;
  left: 170px;
  z-index: 2;
}
.c-red {
  background-image: url("https://assets.codepen.io/54887/c-red.png");
  left: 210px;
  z-index: 1;
}
.strawberry-container {
  position: relative;
}
.strawberry-container p,
.coming-soon p {
  color: #afafaf;
  margin: 0;
  padding: 0;
  font-family: 'Open Sans', sans-serif;
  text-align: center;
  text-transform: uppercase;
  font-size: 3em;
  letter-spacing: 20px;
  font-weight: 300;
  position: relative;
}
.coming-soon {
  position: relative;
}
.coming-soon p {
  font-size: 2em;
}
#fps {
  position: fixed;
  top: 0;
  left: 0;
  background: rgba(255, 255, 255, 0.75);
  padding: 10px;
}

    </style>
</head>

<body>
    <div class="canvas">
      <div class="streak"></div>
      <div class="cosmic-container">
        <div class="c-green"></div>
        <div class="o-orange"></div>
        <div class="s-pink"></div>
        <div class="m-mint"></div>
        <div class="i-orange"></div>
        <div class="c-red"></div>
      </div>
      <div class="strawberry-container">
        <a href="{{ URL::to('admin/dashboard') }}" style="text-decoration: none;">
            <p>mylife</p>
        </a>
      </div>
      <div class="coming-soon">
        <p>coming soon</p>
      </div>
    </div>
    <div id="fps"></div>
</body>
</html>