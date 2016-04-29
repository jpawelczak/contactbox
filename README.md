contactbox
==========

A Symfony project created on April 15, 2016. It is list of user's contacts with addresses and phone numbers.

I used Symfony2, Twig, Doctrine, FOSUserBundle, Bootstrap, jQuery.

IDE: PHP Storm + Atom.

I tried to use other bootstrap theme, but dropped from this idea. Using other bootstrap theme that I am not familiar with is very time consuming... At the moment don't need to have super nice-looking app ;)
 
Have you reviewed the code? Have you noticed something? I didn't add nullable=false in $contact. That is why I added @Assert\NotNull(). This part I like in Symfony - you play with an app, see that you should change this and that, and you just do it, becuase setting up databases with doctrine+symfony is super easy! Quick fix - you can just add Assert as I did and throw an error if something goes wrong.





