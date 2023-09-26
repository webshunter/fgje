<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Setup App</title>
    <script src="assets/file.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                colors: {
                    clifford: '#da373d',
                }
                }
            }
        }
    </script>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        .panel{
            height: 100vh;
            width: 100vw;
            display: grid;
            grid-template-columns: calc(100% /3) calc(100% /3) calc(100% /3);
        }
        .sone{
            display: grid;
            grid-template-rows: 50px calc(100% - 50px);
        }
    </style>
</head>
<body>
    <div class="panel">
        <div class="sone">
            <div class="shadow-xl">
                <div class="p-2 text-xl inline-block">
                    Panel Build
                </div>
                <button class="bg-blue-600 text-white px-3 py-1 rounded " id="new"> Baru </button>
            </div>
            <div class="bg-gray-400" style="overflow-y:scroll;" id="panel-one">

            </div>
        </div>
        <div style="background : lightblue;overflow-y:scroll;">
            <div class="h-[50px] bg-white">
                <div class="p-3" id="setupTitle">

                </div>
            </div>
            <div class="p-2">
                <button class="mb-1 rounded px-3 py-2 w-full bg-blue-600 text-white" id="view">View</button>
                <button class="mb-1 rounded px-3 py-2 w-full bg-blue-600 text-white" id="module">Module</button>
                <div class="p-3" id="setup-form">
                    
                </div>
                <button class="rounded px-3 py-2 w-full bg-blue-600 text-white" id="new-form">new</button>
            </div>
        </div>
        <div style="overflow-y:scroll;">

        </div>
    </div>
    <script>
        
        const news = document.getElementById('new');
        const panel1 = document.getElementById('panel-one');
        const setupTitle = document.getElementById('setupTitle');
        const setupForm = document.getElementById('setup-form');
        const setupButton = document.getElementById('new-form');
        const view = document.getElementById('view');
        const module = document.getElementById('module');

        news.onclick = function(){
            alert('ok');
        }

        let data = [
            {
                name : 'biodata',
                title : 'Biodata',
                icon: 'fas fa-users',
                data: []
            }
        ]

        let dataCall = null;




        const showSetup = function(dc){
            dataCall = dc;
            setupTitle.innerHTML = 'Data : '+dc.title
            console.log(data)
        }

        const _load = function(){

            let content = el('ul').class('m-2 rounded');

            data.forEach(function(j){
                content.child(
                    el('li')
                    .class('bg-gray-100 border-b px-3 py-2')
                    .cursor('pointer')
                    .data('data', btoa( JSON.stringify(j) ) )
                    .text(j.title)
                    .click(function(){
                        let data = this.dataset.data;
                        showSetup( JSON.parse( atob(data) ) );
                    })
                )
            })

            panel1.innerHTML = '';

            panel1.appendChild(content.get());
        
        }

        _load();

    </script>
</body>
</html>