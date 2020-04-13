
      function autocomplete(inp, arr) {
        /*the autocomplete function takes two arguments,
        the text field element and an array of possible autocompleted values:*/
        var currentFocus;
        /*execute a function when someone writes in the text field:*/
        inp.addEventListener("input", function(e) {
            var a, b, i, val = this.value;
            /*close any already open lists of autocompleted values*/
            closeAllLists();
            if (!val) { return false;}
            currentFocus = -1;
            /*create a DIV element that will contain the items (values):*/
            a = document.createElement("DIV");
            a.setAttribute("id", this.id + "autocomplete-list");
            a.setAttribute("class", "autocomplete-items");
            /*append the DIV element as a child of the autocomplete container:*/
            this.parentNode.appendChild(a);
            /*for each item in the array...*/
            for (i = 0; i < arr.length; i++) {
              /*check if the item starts with the same letters as the text field value:*/
              if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                /*create a DIV element for each matching element:*/
                b = document.createElement("DIV");
                /*make the matching letters bold:*/
                b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                b.innerHTML += arr[i].substr(val.length);
                /*insert a input field that will hold the current array item's value:*/
                b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                /*execute a function when someone clicks on the item value (DIV element):*/
                b.addEventListener("click", function(e) {
                    /*insert the value for the autocomplete text field:*/
                    inp.value = this.getElementsByTagName("input")[0].value;
                    /*close the list of autocompleted values,
                    (or any other open lists of autocompleted values:*/
                    closeAllLists();
                });
                a.appendChild(b);
              }
            }
        });
        /*execute a function presses a key on the keyboard:*/
        inp.addEventListener("keydown", function(e) {
            var x = document.getElementById(this.id + "autocomplete-list");
            if (x) x = x.getElementsByTagName("div");
            if (e.keyCode == 40) {
              /*If the arrow DOWN key is pressed,
              increase the currentFocus variable:*/
              currentFocus++;
              /*and and make the current item more visible:*/
              addActive(x);
            } else if (e.keyCode == 38) { //up
              /*If the arrow UP key is pressed,
              decrease the currentFocus variable:*/
              currentFocus--;
              /*and and make the current item more visible:*/
              addActive(x);
            } else if (e.keyCode == 13) {
              /*If the ENTER key is pressed, prevent the form from being submitted,*/
              e.preventDefault();
              if (currentFocus > -1) {
                /*and simulate a click on the "active" item:*/
                if (x) x[currentFocus].click();
              }
            }
        });
        function addActive(x) {
          /*a function to classify an item as "active":*/
          if (!x) return false;
          /*start by removing the "active" class on all items:*/
          removeActive(x);
          if (currentFocus >= x.length) currentFocus = 0;
          if (currentFocus < 0) currentFocus = (x.length - 1);
          /*add class "autocomplete-active":*/
          x[currentFocus].classList.add("autocomplete-active");
        }
        function removeActive(x) {
          /*a function to remove the "active" class from all autocomplete items:*/
          for (var i = 0; i < x.length; i++) {
            x[i].classList.remove("autocomplete-active");
          }
        }
        function closeAllLists(elmnt) {
          /*close all autocomplete lists in the document,
          except the one passed as an argument:*/
          var x = document.getElementsByClassName("autocomplete-items");
          for (var i = 0; i < x.length; i++) {
            if (elmnt != x[i] && elmnt != inp) {
              x[i].parentNode.removeChild(x[i]);
            }
          }
        }
        /*execute a function when someone clicks in the document:*/
        document.addEventListener("click", function (e) {
            closeAllLists(e.target);
        });
      }

      /*An array containing all the country names in the world:*/
var countries = ["Lyari Town", "Saddar Town", "Jamshed Town", "Gadap Town", "SITE Town", "Kemari Town", "Shah Faisal Town","Korangi Town", "Landhi Town", "Bin Qasim Town", "Malir Town", "Gulshan-e-Iqbal Town", "Liaquatabad Town", "North Nazimabad Town", "Gulberg Town", "New Karachi Town","Orangi Town", "Surjani town","Baldia Town","Gulshan-e-Ghazi", "Ittehad Town", "Islam Nagar","Nai Abadi", "Saeedabad", "Muslim Mujahid Colony", "Muhajir Camp", "Rasheedabad","Bin Qasim Town","Ibrahim Hyderi", "Rehri","Cattle Colony", "Qaidabad", "Landhi Colony","Gulshan-e-Hadeed", "Gaghar","Gadap Town",
"Murad Memon Goth", "Darsano Chana", "Gadap", "Gujro", "Songal", "Maymarabad", "Yousuf Goth", "Manghopir","Gulberg Town",
"Azizabad", "Karimabad", "Aisha Manzil", "Ancholi", "Naseerabad", "Yaseenabad", "Water Pump", "Shafiq Mill Colony","Gulshan Town","ZIA COLONY", "Civic Centre", "Pir Ilahi Buksh Colony", "Essa Nagri", "Gulshan-e-Iqbal", "Gillani Railway Station","Dalmia","Jamali Colony", "Gulshan-e-Iqbal II", "Pehlwan Goth", "Matrovil Colony", "Gulzar-e-Hijri", "Safooran Goth","Jamshed Town",
"Akhtar Colony", "Manzoor Colon", "Azam Basti", "Chanesar Goth", "Mahmudabad", "P.E.C.H.S. ", "P.E.C.H.S. II", "Jut Line", "Central Jacob Lines", "Jamshed Quarters", "Garden East","Kemari Town","Kiamari", "Baba Bhit", "Machar Colony", "Maripur", "SherShah", "Gabo Pat","Korangi Town","Bilal Colony", "Nasir Colony", "Chakra Goth", "Mustafa Taj Colony", "Hundred Quarters","Gulzar Colony", "Korangi Sector 33", "Zaman Town", "Hasrat Mohani Colony","Landhi Town","Awami Colony", "Burmee Colony", "Korangi", "Sherabad","Liaquatabad Town","Rizvia Society (R.C.H.S.)", "Firdous Colony", "Sharifabad", "Commercial Area", "Abbasi Shaheed","Lyari Town","Agra Taj Colony", "Daryaabad", "Nawabad", "Khada Memon Society", "Baghdadi", "Bihar Colony", "Ragiwara", "Singo Line", "Shah Baig Line", "Chakiwara", "Allama Iqbal Colony","Malir Town","Model Colony", "Kala Board", "Saudabad", "Khokhra Par", "Jafar-e-Tayyar", "Gharibabad", "Ghazi Brohi Goth","New Karachi Town","North Karachi", "Sir Syed Colony", "Fatima Jinnah Colony", "Godhra", "Abu Zar Ghaffari", "Hakim Ahsan", "Madina Colony", "Faisal Colony", "Khamiso Goth", "Mustufa Colony", "Khawaja Ajmeer Nagri", "Gulshan-e-Saeed", "Shah Nawaz Bhutto Colony","North Nazimabad Town","Paposh Nagar", "Pahar Ganj", "Khandu Goth", "Hyderi", "Sakhi Hassan", "Farooq-e-Azam", "Nusrat Bhutto Colony", "Shadman Town", "Buffer Zone","Orangi Town","Mominabad", "Haryana Colony", "Hanifabad","Mohammad Nagar", "Madina Colony", "Ghaziabad", "Chisti Nagar", "Iqbal Baloch Colony", "Bilal Colony", "Gabol Colony", "Data Nagar", "Mujahidabad", "Baloch Goth","Saddar Town",
"Old Haji Camp", "Garden", "Kharadar", "City Railway Colony", "Nanak Wara", "Gazdarabad", "Millat Nagar/Islam Pura", "Saddar","Civil Line", "Clifton", "Kehkashan", "Dehli Colony","Shah Faisal Town",
"Natha Khan Goth", "Pak Sadat Colony", "Shah Faisal Colony", "Raita Plot", "Moria Khan Goth","Rafa-e-Aam Society", "Al-Falah Society","S.I.T.E. Town","Pak Colony", "Old Golimar", "Jahanabad", "Metrovil", "Bhawani Chali", "Frontier Colony", "Banaras Colony"];

      /*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
      autocomplete(document.getElementById("myInput"), countries);

