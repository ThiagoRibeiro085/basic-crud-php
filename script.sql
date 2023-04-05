use CRUD3;

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
  
);

ALTER TABLE `pages` ADD PRIMARY KEY (`id`);
ALTER TABLE `pages` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
  
 
 

CREATE TABLE `users`  (

  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `passawrd` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
                         

);

ALTER TABLE `users` ADD PRIMARY KEY (`id`);
ALTER TABLE `users` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

