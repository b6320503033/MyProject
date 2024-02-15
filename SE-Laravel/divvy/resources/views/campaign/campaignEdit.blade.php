<form action="{{url('/campaign/update/1')}}" method="POST">
    @csrf
    <label for="Campaign">Campaign Name:</label>
    <input type="text" id="Campaign_Name" name="Campaign_Name" value="{{$campaign->Campaign_Name}}" required>
    <label for="Campaign">Campaign Details:</label>
    <textarea id="Campaign_Details" name="Campaign_Details" value="{{$campaign->Campaign_Details}}" required></textarea>
  
    <label for="Campaign">Campaign Tel:</label>
    <input type="text" id="Campaign_Tel" name="Campaign_Tel" value="{{$campaign->Campaign_Tel}}" required>
  
    <label for="Campaign">Campaign Bank ID:</label>
    <input type="text" id="Campaign_Bank_ID" name="Campaign_Bank_ID" value="{{$campaign->Campaign_Bank_ID}}" required>
  
    <label for="Campaign">Campaign Bank Type:</label>
    <input type="text" id="Campaign_Bank_Type" name="Campaign_Bank_Type" value="{{$campaign->Campaign_Bank_Type}}" required>
  
    <label for="Campaign">Campaign Category:</label>
    <select id="Campaign_Category" name="Campaign_Category" required>
      <option value="">Select a category</option>
      <option value="Education">Education</option>
      <option value="Health">Health</option>
      <option value="Environment">Environment</option>
      <option value="Disaster Relief">Disaster Relief</option>
    </select>
  
    <label for="Campaign">Campaign Type:</label>
    <select id="Campaign_Type" name="Campaign_Type" required>
      <option value="">Select a type</option>
      <option value="1">Individual</option>
      <option value="2">Organization</option>
    </select>
  
    <input type="submit" value="Update">
  </form>