
import requests

def fetch_astronomical_events(date):
    api_key = 'RsEpAKEZeKOd5GtYOpXQMUzeUWAMpce75AdipFeq'  # Replace with your NASA API key
    url = f'https://api.nasa.gov/planetary/apod?date={date}&api_key={api_key}'
    response = requests.get(url)
    if response.status_code == 200:
        return response.json()
    else:
        print(f"Failed to fetch data: {response.status_code}")
        return None

def main():
    date = input("Enter a date (YYYY-MM-DD): ")
    event_data = fetch_astronomical_events(date)
    if event_data:
        print(f"Title: {event_data['title']}")
        print(f"Explanation: {event_data['explanation']}")
    else:
        print("No data available for the entered date.")

if __name__ == "__main__":
    main()
