<div class="bg-white rounded-xl font-poppins w-70 h-60 text-charleston-green p-3 auto ">
    <header class="flex justify-around w-full py-2">
        <button id = "prevButton">
            <i class="fa-solid fa-chevron-left text-sm p-1 shadow-sm hover:shadow-lg rounded-lg px-3"></i>
        </button>
        <span class="item-center text-center font-semibold text-[13px] px-3 m-auto" id ="monthYear"> </span>
        <button id="nextButton">
            <i class="fa-solid fa-chevron-right text-sm p-1 shadow-sm hover:shadow-lg rounded-lg px-3" ></i></button>
    </header>
  
        <ul class="grid grid-cols-7 text-[10px] font-medium items-center text-center mt-3">
            <li class="day">Sen</li>
            <li class="day">Sel</li>
            <li class="day">Rab</li>
            <li class="day">Kam</li>
            <li class="day">Jum</li>
            <li class="day">Sab</li>
            <li class="day">Min</li>
        </ul>  
        
        <ul  id="dates" class="grid grid-cols-7 text-[10px] font-medium items-center text-center ">
    
        </ul>


    {{-- <script>
        const monthYear = document.getElementById('monthYear');
        const datesElement = document.getElementById('dates');
        const prevButton = document.getElementById('prevButton');
        const nextButton = document.getElementById('nextButton');
       
    
        let currentDate = new Date();
        
        const updateCalendar = () => {
            const currentYear = currentDate.getFullYear();
            const currentMonth = currentDate.getMonth();
            const firstDay = new Date(currentYear, currentMonth, 0);
            const lastDay = new Date(currentYear, currentMonth + 1, 0);
            const totalDays = lastDay.getDate();
            const firstDayInd = firstDay.getDay();
            const lastDayInd = lastDay.getDay();
    
            const monthYearString = currentDate.toLocaleString(
                'default', {month : 'long', year : 'numeric'}
            );
            monthYear.textContent = monthYearString;
            
            let datesInd = '';
            
            for(let i = firstDayInd; i > 0; i--) {
                const prevDates = new Date(currentYear, currentMonth, 0 - i + 1);
                datesInd += `<li>${prevDates.getDay()}</li>`;
            }
    
            for(let i = 1 ; i <= totalDays; i++ ) {
                datesInd += `<li >${i}</li>` ;
            }
    
            for(let i = 1; i <= 7 - lastDayInd ; i++) {
                const nextDates = new Date(currentYear, currentMonth + 1,  i);
                datesInd += `<li >${nextDates.getDay()}</li>`;
            }
    
            datesElement.innerHtml = datesInd;
    
        }
    
        updateCalendar();
    
    </script> --}}
</div>


<script>
    const monthYear = document.getElementById('monthYear');
    const datesElement = document.getElementById('dates');
    const prevButton = document.getElementById('prevButton');
    const nextButton = document.getElementById('nextButton');
    

   

    let currentDate = new Date();
    
    const updateCalendar = () => {
        const currentYear = currentDate.getFullYear();
        const currentMonth = currentDate.getMonth();
        const firstDay = new Date(currentYear, currentMonth, 0);
        const lastDay = new Date(currentYear, currentMonth + 1, 0);
        const totalDays = lastDay.getDate();
        const firstDayInd = firstDay.getDay();
        const lastDayInd = lastDay.getDay();
      

        const monthYearString = currentDate.toLocaleString(
            'default', {month : 'long', year : 'numeric'}
        );
        monthYear.textContent = monthYearString;
        
        let datesInd = "";
        
        for(let i = firstDayInd; i > 0; i--) {
            const prevDates = new Date(currentYear, currentMonth, 0 - i + 1);
            datesInd += `<li class="aspect-square m-auto p-1 text-grey-100">${prevDates.getDate()}</li>`;
        }

        for(let i = 1 ; i <= totalDays; i++ ) {
            const todayDate = new Date (currentYear, currentMonth, i);
            const today = todayDate.toDateString() === new Date().toDateString() ? 'text-white rounded-full bg-red-bright' : '';
            datesInd += `<li class ="font-semibold aspect-square m-auto p-1 ${today} h-full" >${i}</li>` ;
         
        }

        for(let i = 0; i < 7 - lastDayInd ; i++) {
            const nextDates = new Date(currentYear, currentMonth + 1,  i);
            datesInd += `<li class="aspect-square m-auto p-1 text-grey-100" >${nextDates.getDay()}</li>`;
        }

        datesElement.innerHTML = datesInd;

    }

   

    prevButton.addEventListener('click', () => {
        currentDate.setMonth(currentDate.getMonth() - 1);
        updateCalendar();
    });

    nextButton.addEventListener('click', () => {
        currentDate.setMonth(currentDate.getMonth() + 1);
        updateCalendar();
    });

    updateCalendar();

</script>