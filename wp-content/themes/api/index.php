<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
    <style>
        *{
           padding: 0px;
           margin: 0px;
           box-sizing: border-box;
           font-family: 'Poppins', sans-serif;
        }
        body {
          display: flex;
          justify-content: center;
          align-items: center;
          min-height: 100vh;
          background: #252839;
        }
        h2 {
          position: relative;
          font-size: 14vw;
          color: #252839;
          -webkit-text-stroke: 0.3vw #383d52;
          text-transform: uppercase;
        }
        h2::before {
          content: attr(data-text);
          position: absolute;
          top:0;
          left:0;
          width:0;
          height: 100%;
          color: #01fe87;
          -webkit-text-stroke: 0vw #383d52;
          border-right: 2px solid #01fe87;
          overflow: hidden;
          animation: animate 6s linear infinite;
        }
      @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap');
      @keyframes  animate {
        0%, 10%, 100% {

        }
        70%, 90% {
          width: 100%;
        }
      }
    </style>
</head>
<body>
<div>
  <h2 data-text="Casino ...">Casino ...</h2>
</div>
</body>
</html>