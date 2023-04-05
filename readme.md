![icon](https://imgur.com/8SeqApq.png)

# The Epic Gamer website
> Epic gaming. Epic news.

The epic gamer (TEG) is a personal project of mine which can be summarised as an on-and-off high-effort joke. It masquarades as a
gamer-centered, gamer-rights news site for satirical purposes. Everything on this site should be taken with a cubic meter
of salt. 

### Lore

The name originally draws inspiration from publications such as The Times or
The Guardian, The Wall Street Journal, The so on and so on, thus... The Gamer? Oh... it's already taken. Someone has had this idea before me. 
But fortunatelly The *Epic* Gamer, to my knowledge, was up for grabs.

## How to set it up:
The whole website runs on PHP. You also need some relational database, such as MySQL. Conveniently enough both of these
are supplied by xampp/lampp. All content such as **articles, quizes, tags, authors and ads** can be added via the API. A convenient wrapper for it can
be found [here](https://github.com/IMatynia/teg-database-api). On that repository you can also find SQL scripts that
need to be ran to set up the structure of the database. Before using the API, you also need to create an API key. The best method 
is to simply use the PLSQL function provided (`generate_api_key(gen_text, quota, expiration_date)`)

## Features:

### News feed:
The news feed shows articles stored in the database. They can be filtered by tag. Each article can contain text marked
with basic HTML tags such as p, h1...5, and others which is neatly formatted by the stylesheet.
![news](https://imgur.com/9vjLjDC.png)

### Quizes:
Keep your users eternally engaged with meaningless tasks directed at their need for self affirmation! Quizes are at 
your disposal. Just like articles, they can also be filtered by tag. Questions can be of 2 types: Spectrum and Yes/No. After anwsering all 
questions user is greeted by a screen showing their score.
![quizes](https://imgur.com/xJ4XEtd.png)