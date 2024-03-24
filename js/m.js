// const camelLetters = (v) => {

//     let camelString = "";

//     for( let i = 0 ; i < v.length -1 ; i++){

//         if(i % 2 ==0){
//             camelString += v[i].toUpperCase();
//         }else
//         camelString += v[i].toLowerCase();
//     }

//     return camelString;
// };


// console.log(camelLetters("hello"));


function closeSecondDiv(html) {
    let divCount = 0;
    let result = "";
  
    for (let i = 0; i < html.length; i++) {
      let char = html[i];
  
      if (char === '<') {
        // Controlla se è un tag di apertura <div>
        if (html.slice(i, i + 4) === '<div') {
          divCount++; 
        }
      }
  
      result += char;
      
      if (divCount === 2) {
        result += "/";
        divCount = 0;
      }
    }
  
    return result;
  }
  
  // Esempi
  let html1 = "<div><div>";
  console.log(closeSecondDiv(html1)); // "<div></div>"
  
  let html2 = "<div><p><p><div><div><div>"; 
  console.log(closeSecondDiv(html2)); // "<div><p></p></div><div></div>"