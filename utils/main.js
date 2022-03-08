const Louga = document.getElementById("louga")
const Dakar = document.getElementById("dakar")
const Fatick = document.getElementById("fatick")
const Sel = document.getElementById("sel")
const contentsLg = document.getElementsByClassName('masqueDptlg');
const contentsDk = document.getElementsByClassName('masqueDptdk');
const contentsFt = document.getElementsByClassName('masqueDptft');
const contentsSl = document.getElementById('selection');
const contentsSlCom = document.getElementById('selectionCom');

const contentsComLg = document.getElementsByClassName('masqueComlg');
const contentsComDk = document.getElementsByClassName('masqueComdk');
const contentsComFt = document.getElementsByClassName('masqueComft');

Louga.addEventListener("click", (event) => {
  for(const elt of contentsLg) {
    elt.style.display="block"
    elt.addEventListener("click", (event) => {
      if(elt.getAttribute("value") =='KÉBÉMER')
      {
        for(const elt of contentsComLg) {
          elt.style.display="block"
        }
        for(const elt of contentsComDk) {
          elt.style.display="none"
        }
        for(const elt of contentsComFt) {
          elt.style.display="none"
        }
      }
      
    });
  }
  for(const elt of contentsDk) {
    elt.style.display="none"
  }
  for(const elt of contentsFt) {
    elt.style.display="none"
  }
});


Dakar.addEventListener("click", (event) => {
  for(const elt of contentsDk) {
    elt.style.display="block"
    elt.addEventListener("click", (event) => {
      if(elt.getAttribute("value") =='Dakar')
      {
        for(const elt of contentsComLg) {
          elt.style.display="none"
        }
        for(const elt of contentsComDk) {
          elt.style.display="block"
        }
        for(const elt of contentsComFt) {
          elt.style.display="none"
        }
      }
      
    });
  }
  for(const elt of contentsLg) {
    elt.style.display="none"
  }
  for(const elt of contentsFt) {
    elt.style.display="none"
  }
});

Fatick.addEventListener("click", (event) => {
  for(const elt of contentsFt) {
    elt.style.display="block"
    elt.addEventListener("click", (event) => {
      if(elt.getAttribute("value") =='Fatick')
      {
        for(const elt of contentsComLg) {
          elt.style.display="none"
        }
        for(const elt of contentsComDk) {
          elt.style.display="none"
        }
        for(const elt of contentsComFt) {
          elt.style.display="block"
        }
      }
      
    });
  } 
  for(const elt of contentsDk) {
    elt.style.display="none"
  }
  for(const elt of contentsLg) {
    elt.style.display="none"
  }
});

Sel.addEventListener("click", (event) => {
  contentsSl.style.display="block"
  contentsSlCom.style.display="block"
  for(const elt of contentsLg) {
    elt.style.display="none"
  }
  for(const elt of contentsDk) {
    elt.style.display="none"
  }
  for(const elt of contentsFt) {
    elt.style.display="none"
  }
  for(const elt of contentsComLg) {
    elt.style.display="none"
  }
  for(const elt of contentsComDk) {
    elt.style.display="none"
  }
  for(const elt of contentsComFt) {
    elt.style.display="none"
  }
});

contentsSlCom.addEventListener("click", (event) => {
  contentsSl.style.display="block"
  Sel.style.display="block"
  for(const elt of contentsLg) {
    elt.style.display="none"
  }
  for(const elt of contentsDk) {
    elt.style.display="none"
  }
  for(const elt of contentsFt) {
    elt.style.display="none"
  }
  for(const elt of contentsComLg) {
    elt.style.display="none"
  }
  for(const elt of contentsComDk) {
    elt.style.display="none"
  }
  for(const elt of contentsComFt) {
    elt.style.display="none"
  }
});

contentsSl.addEventListener("click", (event) => {
  contentsSlCom.style.display="block"
  Sel.style.display="block"
  for(const elt of contentsLg) {
    elt.style.display="none"
  }
  for(const elt of contentsDk) {
    elt.style.display="none"
  }
  for(const elt of contentsFt) {
    elt.style.display="none"
  }
  for(const elt of contentsComLg) {
    elt.style.display="none"
  }
  for(const elt of contentsComDk) {
    elt.style.display="none"
  }
  for(const elt of contentsComFt) {
    elt.style.display="none"
  }
});