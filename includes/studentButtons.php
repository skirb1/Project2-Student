<div id="printDiv">
    <form name="printForm">
        
    <input type="button" value="Cancel" onclick="parent.location='cancelAppt.php'">
    <button id="printBtn">Print</button>
        
        <script>
            var btn = document.getElementById('printBtn');
            btn.addEventListener('click', function() 
                {
                    window.print();
                });
        </script>

  
    </form>
</div>