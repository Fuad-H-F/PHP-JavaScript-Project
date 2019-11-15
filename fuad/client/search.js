
            function searchname()
            {
                var val = document.getElementById('sfiled').value;
                //console.log(val);
                var xhttp = new XMLHttpRequest();
                xhttp.open("GET", "search.php?key="+val, true);
                xhttp.send();
                var table = document.getElementById('svalue');
                var length = table.rows.length;
                for(var i = table.rows.length - 1; i > -1; i--)
                {
                    table.deleteRow(i);
                }

                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        var row = table.insertRow(table.rows.length);
                        var cell1 = row.insertCell(0);
                        var value = this.responseText.toString();
                        //setvalue(value);
                        cell1.innerHTML = "<span onclick='setvalue("+value+")'>"+this.responseText+"</span>";
                        var p = "<span onclick='setvalue("+value+")'>"+this.responseText+"</span>";
                        //setvalue(value);
                        console.log(p);
                    }
                };
                if(val === "")
                    document.getElementById("search_val").style.display = 'none';
                else
                    document.getElementById("search_val").style.display = 'block';
            }

            function setvalue(name){
                console.log('name: '+name);
                document.getElementById('sfiled').value = name;
                document.getElementById("search_val").style.display = 'none';
            }