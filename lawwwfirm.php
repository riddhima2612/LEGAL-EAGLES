<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menstrual Cycle Tracker</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    /* Custom CSS styles */
    /* Add your custom styles here */
  </style>
</head>
<body>
  <div class="container mt-5">
    <h1 class="text-center">Menstrual Cycle Tracker</h1>
    <div class="row mt-4">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">Track Period</div>
          <div class="card-body">
            <form id="periodForm">
              <div class="form-group">
                <label for="startDate">Start Date:</label>
                <input type="date" class="form-control" id="startDate" required>
              </div>
              <div class="form-group">
                <label for="endDate">End Date:</label>
                <input type="date" class="form-control" id="endDate" required>
              </div>
              <button type="submit" class="btn btn-primary">Add Period</button>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">Cycle History</div>
          <div class="card-body">
            <ul id="cycleList" class="list-group">
              <!-- Cycle data will be dynamically added here -->
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    // JavaScript code for handling form submission and cycle data
    document.getElementById('periodForm').addEventListener('submit', function(event) {
      event.preventDefault();
      const startDate = document.getElementById('startDate').value;
      const endDate = document.getElementById('endDate').value;
      const cycleDuration = calculateCycleDuration(startDate, endDate);
      const cycleData = {
        startDate: startDate,
        endDate: endDate,
        duration: cycleDuration
      };
      addCycleData(cycleData);
      clearForm();
    });

    function calculateCycleDuration(startDate, endDate) {
      const start = new Date(startDate);
      const end = new Date(endDate);
      const durationInDays = Math.ceil((end - start) / (1000 * 60 * 60 * 24));
      return durationInDays;
    }

    function addCycleData(cycleData) {
      const cycleList = document.getElementById('cycleList');
      const listItem = document.createElement('li');
      listItem.className = 'list-group-item';
      listItem.innerHTML = `<strong>Start Date:</strong> ${cycleData.startDate}, <strong>End Date:</strong> ${cycleData.endDate}, <strong>Duration:</strong> ${cycleData.duration} days`;
      cycleList.appendChild(listItem);
    }

    function clearForm() {
      document.getElementById('startDate').value = '';
      document.getElementById('endDate').value = '';
    }
  </script>
</body>
</html>
