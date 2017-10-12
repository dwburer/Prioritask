# Prioritask

CSCI-4235 Final Project.

### Setup

Python dependencies:

`pip3 install -r requirements.txt`

if your running a macOSX
and you get an error for ffih.h file not found


```
sudo pip install ez_setup
brew install pkg-config libffi
```

and than run

'pip3 install -r requirements.txt'

NPM dependencies:

```
cd static
npm install
```

### Development

Start flask server:

`python manage.py runserver`

Start webpack/watcher:
```
cd static
npm start
```

For development reference, check out [https://github.com/dternyak/React-Redux-Flask]
