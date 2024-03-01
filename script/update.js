function post(page) {
    switch (page) {
      case 1:
        //Insert Figure
        window.open(
          "../html/addFigure.html",
          "_self"
        );
        break;
      case 2:
        //Delete Figure
        window.open(
          "../html/selectFigure.html",
          "_self"
        );
        break;
      case 3:
        //Insert Figure
        window.open(
          "../html/addMember.html",
          "_self"
        );
        break;
      case 4:
        //Delete Figure
        window.open(
          "../html/selectMember.html",
          "_self"
        );
        break;
      case 5:
        //Insert Figure
        window.open(
          "../html/addProject.html",
          "_self"
        );
        break;
      case 6:
        //Delete Figure
        window.open(
          "../html/selectProject.html",
          "_self"
        );
        break;
    }
  }

  document.getElementById("new").style.display = ''