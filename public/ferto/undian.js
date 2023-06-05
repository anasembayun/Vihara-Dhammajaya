var myobject = {
    ValueA : 'Pilih Hadiah',
    ValueB : 'Rice Cooker',
    ValueC : 'Kulkas 2 pintu',
    ValueD : 'Mobil'
};
var select = document.getElementById("list_hadiah");
for(index in myobject) {
    select.options[select.options.length] = new Option(myobject[index], index);
}

let user_undian = [];
let user_nama = [];
let counter = 0;
let index_winner = 0;
let duration = 2;
let groups = 1;
let counter_nomor = 0;
let counter1 = 1;
let counter2 = 1;
let counter3 = 1;

const doors = document.querySelectorAll(".door");

let items = [
    "0","1","2","3","4","5","6","7","8","9",
    "A","B","C","D","E","F","G","H","I","J",
    "K","L","M","N","O","P","Q","R","S","T",
    "U","V","W","X","Y","Z"
];

user_undian = [
    "01JF83JA",
    "8SJ30FKB",
    "9M23JD7C",
    "92JF20LD",
    "92K2KD8E",
    "92DL241F",
    "K93JL01G",
    "1J83OKLH",
    "0L29DK2I",
    "82KD82KJ"
]

user_nama = [
    "user1",
    "user2",
    "user3",
    "user4",
    "user5",
    "user6",
    "user7",
    "user8",
    "user9",
    "user10"
]

console.log(user_undian);
console.log(user_nama);

for (const door of doors) {
    const boxes = door.querySelector(".boxes");
        const boxesClone = boxes.cloneNode(false);
        const pool = ["❓"];
    for (let i = pool.length - 1; i >= 0; i--) {
        const box = document.createElement("div");
        box.classList.add("box");
        box.style.width = door.clientWidth + "px";
        box.style.height = door.clientHeight + "px";
        box.textContent = pool[i];
        boxesClone.appendChild(box);
    }
    door.replaceChild(boxesClone, boxes);
}

async function spin(ulang = false, tempID="", tempCounter=0) {

    console.log("spin");
    index_winner = Math.floor(Math.random() * (user_undian.length-1));

    for (const door of doors) {
        const boxes = door.querySelector(".boxes");
        const boxesClone = boxes.cloneNode(false);

        const pool = ["❓"];
        const arr = [];
        for (let n = 0; n < (groups > 0 ? groups : 1); n++) {
        arr.push(...items);
        }
        pool.push(...shuffle(arr));

        boxesClone.addEventListener(
        "transitionstart",
        function () {
            door.dataset.spinned = "1";
            this.querySelectorAll(".box").forEach((box) => {
            box.style.filter = "blur(1px)";
            });
        },
        { once: true }
        );

        boxesClone.addEventListener(
        "transitionend",
        function () {
            this.querySelectorAll(".box").forEach((box, index) => {
            box.style.filter = "blur(0)";
            if (index > 0) this.removeChild(box);
            });
        },
        { once: true }
        );
        
        for (let i = pool.length - 1; i >= 0; i--) {
            const box = document.createElement("div");
            box.classList.add("box");
            box.style.width = door.clientWidth + "px";
            box.style.height = door.clientHeight + "px";
            box.textContent = pool[i];
            boxesClone.appendChild(box);
        }
        boxesClone.style.transitionDuration = `${duration > 0 ? duration : 1}s`;
        boxesClone.style.transform = `translateY(-${
            door.clientHeight * (pool.length - 1)
        }px)`;
        door.replaceChild(boxesClone, boxes);
    }

    for (const door of doors) {
        const boxes = door.querySelector(".boxes");
        const duration = parseInt(boxes.style.transitionDuration);
        boxes.style.transform = "translateY(0)";
        await new Promise((resolve) => setTimeout(resolve, duration * 500));
    }


    var e = document.getElementById("list_hadiah");
    var value = e.value;
    var text = e.options[e.selectedIndex].text+" - ";
    if(e.selectedIndex==0){
        text+=counter1;
        counter1++;
    }
    else if (e.selectedIndex==1){
        text+=counter2;
        counter2++;
    }
    else if (e.selectedIndex==2){
        text+=counter3;
        counter3++;
    }


    if(!ulang){
        counter_nomor++;

        var row = "";
        row += "<tr id='"+ user_undian[index_winner] + "'><td>" + counter_nomor + "</td><td>" + user_undian[index_winner] + "</td><td>" + user_nama[index_winner] + "</td><td>" + text + "</td><td>";
        // row += "<div class='btn btn-warning' onclick='spin(true,\""+ user_undian[index_winner] +"\"," + counter_nomor + ")'>Ulang</div>&nbsp<div class='btn btn-success'>Sah</div>"+"</td></tr>";
        row+="</tr>";
        setTimeout(function(){
            document.querySelector("#table-winner").insertAdjacentHTML('beforeend', row);
            user_undian.splice(index_winner, 1);
            user_nama.splice(index_winner, 1);
            $('#mmMyModal').modal();
        }, duration*1000);
    }
    else{
        var targetDiv = document.getElementById(tempID);
        var row = "";
        row += "<tr id='"+ user_undian[index_winner] + "'><td>" + tempCounter + "</td><td>" + user_undian[index_winner] + "</td><td>" + user_nama[index_winner] + "</td><td>" + text + "</td><td>";
        // row += "<div class='btn btn-warning' onclick='spin(true,\""+ user_undian[index_winner] +"\"," + tempCounter + ")'>Ulang</div>&nbsp<div class='btn btn-success'>Sah</div>"+"</td></tr>";
        row+="</tr>";
        setTimeout(function(){
            targetDiv.innerHTML = row;
            document.getElementById(tempID).id = user_undian[index_winner];
            user_undian.splice(index_winner, 1);
            user_nama.splice(index_winner, 1);
            $('#mmMyModal').modal();
            }, duration*1000);
    }
    
}



function shuffle([...arr]) {
    console.log("arr");
    console.log(arr);
    let m = arr.length;
    while (m) {
    const i = Math.floor(Math.random() * m--);
    [arr[m], arr[i]] = [arr[i], arr[m]];
    }

    counter++;
    if(counter==9){
    counter=1;
    }

    console.log("winnerrr");
    let winner = user_undian[index_winner];

    console.log(winner);

    arr[35] = winner[counter-1];

    return arr;
}