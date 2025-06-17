document.addEventListener('DOMContentLoaded', function() {
    // This would be replaced with actual API call in production
    fetchWorkerDetails();
    
    function fetchWorkerDetails() {
        // Mock API response
        const mockResponse = {
            workers: [
                { role: "Lead Worker", name: "John Doe" },
                { role: "Co-team", name: "Jane Smith" },
                { role: "Co-team", name: "Robert Johnson" }
            ]
        };
        
        populateWorkerDetails(mockResponse.workers);
        
        // In production, you would use:
        /*
        fetch('/api/order/workers')
            .then(response => response.json())
            .then(data => populateWorkerDetails(data.workers))
            .catch(error => console.error('Error:', error));
        */
    }
    
    function populateWorkerDetails(workers) {
        const workersList = document.querySelector('.workers-list');
        workersList.innerHTML = '';
        
        workers.forEach(worker => {
            const workerCard = document.createElement('div');
            workerCard.className = 'worker-card';
            workerCard.innerHTML = `
                <div class="worker-role">${worker.role}</div>
                <div class="worker-name">${worker.name}</div>
            `;
            workersList.appendChild(workerCard);
        });
    }
    
    // This would be replaced with real-time updates in production
    // For demo purposes, we'll simulate progress updates
    setTimeout(() => {
        document.querySelectorAll('.tracker-step')[2].classList.add('active');
    }, 5000);
    
    setTimeout(() => {
        document.querySelectorAll('.tracker-step')[3].classList.add('active');
    }, 10000);
});