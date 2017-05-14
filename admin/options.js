     var colors="";
              var colorsn=0;
            function getColorTitle()
                {
                    return document.getElementById("option-color-title").value;
                }
            function addColorOption(title)
            {
                    if (title!="")
                        {

                  if(colorsn==0)
                    {
                        colorsn+=1;
                        colors='{"title": "Цвет","n": "1","list": [{"id":"'+title+'"}]}';
                    }
                    else
                    {
                        colorsn+=1;

                        colors=JSON.parse(colors);
                        colors.n = colorsn;
                        colors=JSON.stringify(colors);
                        colors=colors.slice(0,-2);
                        colors=colors + ',{"id":"'+ title+'"}]}';
                        console.log(colors);
                    }
                    showcolors(colors)
                    $("#option-colors").attr("value",colors);
                    document.getElementById("option-color-title").value = "";
                                                    }

            }

   function showcolors(c)
            {
                try {
                          c=JSON.parse(c);
                      document.getElementById("color-options").innerHTML = "";
            jQuery.each(c.list, function(i, val) {
                    document.getElementById("color-options").innerHTML+="<li>"+val.id+" <img class='remove-file' src='/css/images/close.svg' onclick='removecolor("+ '"'+ val.id + '"' +")' > </li>";                
            });
            c=JSON.stringify(c);
            
            $("#option-colors").attr("value",c);
                } catch (error) {
                    
                }
              
     }
   function setcolors(c)
   {
       try {
            colors = c;
         c=JSON.parse(c);
         colorsn =parseInt(c.n);
       } catch (error) {
           
       }
      
   }
    function removecolor(c)
   {
       colors = JSON.parse(colors);

        for (var i=0;i < colorsn;i++)
    {
    if (colors.list[i].id == c) {

            delete colors.list[i];
            colors.n -=1;
            colors = JSON.stringify(colors);
               colors = colors.replace(',null','');
               colors = colors.replace('[null,','[');
               
               colorsn -=1;
               
            showcolors(colors);
                    $("#option-colors").attr("value",colors);
            
//            location.reload();
            break;
        }
    }
   }

     
      var sizes="";
                         var sizesn=0;
            function getSizeTitle()
            {
                               return document.getElementById("option-size-title").value;
            }
            function sizesbra(){
                sizesn=9;
                sizes='{\"title\":\"Цвет\",\"n\":9,\"list\":[{\"id\":\"70А\"},{\"id\":\"70В\"},{\"id\":\"70С\"},{\"id\":\"75А\"},{\"id\":\"75В\"},{\"id\":\"75С\"},{\"id\":\"80А\"},{\"id\":\"80В\"},{\"id\":\"80С\"}]}';
                showsizes(sizes);
                $("#option-sizes").attr("value",sizes);
         }
            function addSizeOption(title)
            {
                               if (title!="")
                                   {

                             if(sizesn==0)
                               {
                                   sizesn+=1;
                                   sizes='{"title": "Цвет","n": "1","list": [{"id":"'+title+'"}]}';
                               }
                               else
                               {
                                   sizesn+=1;

                                   sizes=JSON.parse(sizes);
                                   sizes.n = sizesn;
                                   sizes=JSON.stringify(sizes);
                                   sizes=sizes.slice(0,-2);
                                   sizes=sizes + ',{"id":"'+ title+'"}]}';
                                   console.log(sizes);
                               }
                               document.getElementById("size-options").innerHTML+="<li>"+title+" <img class='remove-file' src='/css/images/close.svg' ></li>";
                               ""
                               $("#option-sizes").attr("value",sizes);
                               document.getElementById("option-size-title").value = "";
                                                               }

             }
      
        function showsizes(c)
            {
                try {
                     c=JSON.parse(c);
                      document.getElementById("size-options").innerHTML = "";

            jQuery.each(c.list, function(i, val) {
                    document.getElementById("size-options").innerHTML+="<li>"+val.id+" <img class='remove-file' src='/css/images/close.svg' onclick='removesize("+ '"'+ val.id + '"' +")' > </li>";                
            });
                        c=JSON.stringify(c);
                        $("#option-sizes").attr("value",c);
                } 
                 catch (error) {
         
     }
                   
     }
    
        function setsizes(c)
   {
       try {
            sizes = c;
         c=JSON.parse(c);
         sizesn =parseInt(c.n);
       } catch (error) {
           
       }
      
   }
          function removesize(c)
   {
       sizes = JSON.parse(sizes);

        for (var i=1;i <= sizesn;i++)
    {
    if (sizes.list[i].id == c) {

            delete sizes.list[i];
            sizes.n -=1;
            sizes = JSON.stringify(sizes);
               sizes = sizes.replace(',null','');
               sizesn -=1;
               
            showsizes(sizes);
//            location.reload();
            break;
        }
    }
   }
        
        var suggestions="";
              var suggestionsn=0;
            function getsuggestionsId()
                {
                    return document.getElementById("option-suggestions-title").value;
                }
      function getsuggestionsTitle()
                {
                var id=parseInt(document.getElementById("option-suggestions-title").value);
                    return $("#s"+id).attr("data-title");
                }
            function addsuggestionsOption(title,id)
                {
                    if (title!="")
                        {

                  if(suggestionsn==0)
                    {
                        suggestionsn+=1;
                        suggestions='{"title": "Товары","n": "1","list": [{"id":"'+id+'"}]}';
                    }
                    else
                    {
                        suggestionsn+=1;
                        suggestions=JSON.parse(suggestions);
                        suggestions.n = suggestionsn;
                        suggestions=JSON.stringify(suggestions);
                        suggestions=suggestions.slice(0,-2);
                        suggestions=suggestions + ',{"id":"'+ id+'"}]}';
                         console.log(suggestions);
                    }
                    document.getElementById("suggestions-options").innerHTML+='<li>'+title+" <img class='remove-file' src='/css/images/close.svg' >"+'</li>';
//                    console.log(list);
                             $("#option-suggestions").attr("value",suggestions);
                    document.getElementById("option-suggestions-title").value = "";
                                                    }

                }
            function removeColorOption(title)
                {

                }
