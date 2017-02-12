# Exilemod player banners
#### Creates configurable dynamic images from server player data

Thanks to SmItH197 for his [steam authentication](https://github.com/SmItH197/SteamAuthentication) module.

### What this does:
Gives players options for backgrounds, colors and fonts to display a player card with their data such as name, k/d, poptabs, clan, connections within a .png image file that is dynamic, in that it will update with the help of a cron job.

### Setup:
1. Create a folder called 'exilepng' in the root of your webserver (xampp etc).

2. unzip the contents exilemod-player-banners.zip into the exilepng directory

3. Edit `player.php image.php` and `create.php` with your mysql details aswell as other configs stated within the files (such as server address and name).

4. Run `insert.sql` into your exilemod database.

5. Setup a cron job pointing to the webaddress of `create.php` (i recommend https://cron-job.org/en/ set for every 1 hour)

#### Optional:

Create own backgrounds 800x200

add more fonts

#### End word:

If you see errors or have ways of improvment for all means do a pull request, if you are a designer i will gladly accept your backgrounds into the main project. These banners may be on the ugly side, i am not a designer if you have styles, colors and positions that flow well let me know.

Enjoy, a lot more can be done around php to png creation hopefully this inspires myself or others to achieve cool things.