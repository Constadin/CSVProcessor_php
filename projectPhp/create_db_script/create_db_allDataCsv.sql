CREATE DATABASE IF NOT EXISTS CsvRec;
USE CsvRec;
CREATE TABLE IF NOT EXISTS Rec (
Id VARCHAR(255),
Name VARCHAR(255),
Score VARCHAR(255),
LogIn VARCHAR(255),
LogOut VARCHAR(255),
Date VARCHAR(255),
Email VARCHAR(255),
Age VARCHAR(255),
Country VARCHAR(255),
MobileNumber VARCHAR(255),
PRIMARY KEY (Id)
);
INSERT INTO Rec (Id, Name, Score, LogIn, LogOut, Date, Email, Age, Country, MobileNumber)
VALUES ('2525', 'Adele', '450000', '', '', '13/06/2020', '', '', '', ''),
('63184', 'Alex Klineman', '789', '17:30', '02:45', '01/15/2022', 'alex.klineman@example.com', '32', 'USA', ''),
('69824', 'André Heller', '678', '16:45', '01:30', '12/05/2021', 'andre.heller@example.com', '30', 'Brazil', ''),
('1414', 'Antoine Griezmann', '321098', '', '', '05/09/2022', '', '', '', ''),
('15672', 'April Ross', '876', '12:15', '21:30', '04/18/2021', 'april.ross@example.com', '39', 'USA', ''),
('3434', 'Ariana Grande', '450000', '', '', '03/07/2021', '', '', '', ''),
('4949', 'Ariana Grande', '490000', '', '', '05/04/2023', '', '', '', ''),
('75389', 'Babe Ruth', '345', '09:15', '18:00', '10/02/2020', 'babe.ruth@example.com', '54', 'USA', ''),
('16924', 'Barry Bonds', '567', '15:30', '00:00', '10/25/2021', 'barry.bonds@example.com', '48', 'USA', ''),
('2626', 'Beyoncé', '560000', '', '', '25/07/2020', '', '', '', ''),
('3939', 'Billie Eilish', '460000', '', '', '02/02/2022', '', '', '', ''),
('4848', 'Billie Eilish', '440000', '', '', '21/02/2023', '', '', '', ''),
('3131', 'Bruno Mars', '320000', '', '', '26/02/2021', '', '', '', ''),
('17628', 'Bruno Rezende', '876', '12:15', '21:30', '04/18/2021', 'bruno.rezende@example.com', '39', 'Brazil', ''),
('2002', 'Cristiano Ronaldo', '345678', '', '', '15/09/2020', '', '', '', ''),
('77254', 'Daisuke Matsuzaka', '876', '12:15', '21:30', '04/18/2021', 'daisuke.matsuzaka@example.com', '41', 'Japan', ''),
('04521', 'Dante Amaral', '987', '11:00', '20:00', '02/05/2021', 'dante.amaral@example.com', '43', 'Brazil', ''),
('4343', 'Demi Lovato', '480000', '', '', '22/07/2022', '', '', '', ''),
('58641', 'Derek Jeter', '250', '08:45', '17:30', '10/02/2020', 'derek.jeter@example.com', '42', 'USA', ''),
('3333', 'Drake', '390000', '', '', '22/05/2021', '', '', '', ''),
('4040', 'Dua Lipa', '350000', '', '', '16/03/2022', '', '', '', ''),
('4646', 'Dua Lipa', '460000', '', '', '27/11/2022', '', '', '', ''),
('2727', 'Ed Sheeran', '300000', '', '', '08/09/2020', '', '', '', ''),
('1515', 'Eden Hazard', '432109', '', '', '15/11/2022', '', '', '', ''),
('1717', 'Gareth Bale', '654321', '', '', '08/03/2023', '', '', '', ''),
('37189', 'Giba', '456', '14:45', '23:15', '08/12/2021', 'giba@example.com', '42', 'Brazil', ''),
('79436', 'Gibal', '250', '08:45', '17:30', '05/10/2020', 'gibal@example.com', '47', 'Brazil', ''),
('58123', 'Gustavo Endres', '567', '15:30', '00:00', '10/25/2021', 'gustavo.endres@example.com', '45', 'Brazil', ''),
('42971', 'Hank Aaron', '876', '12:15', '21:30', '04/18/2021', 'hank.aaron@example.com', '60', 'USA', ''),
('1212', 'Harry Kane', '901234', '', '', '10/05/2022', '', '', '', ''),
('4242', 'Harry Styles', '410000', '', '', '10/06/2022', '', '', '', ''),
('58834', 'Hideki Matsui', '987', '11:00', '20:00', '02/05/2021', 'hideki.matsui@example.com', '47', 'Japan', ''),
('39427', 'Hideo Nomo', '123', '10:30', '19:00', '12/20/2020', 'hideo.nomo@example.com', '52', 'Japan', ''),
('11408', 'Ichiro Suzuki', '250', '08:45', '17:30', '05/10/2020', 'ichiro.suzukiUSAGiba@example.com', '47', 'Japan', ''),
('25897', 'Jackie Robinson', '987', '11:00', '20:00', '02/05/2021', 'jackie.robinson@example.com', '53', 'USA', ''),
('45823', 'Jake Gibb', '567', '15:30', '00:00', '10/25/2021', 'jake.gibb@example.com', '45', 'USA', ''),
('4444', 'John Legend', '390000', '', '', '03/09/2022', '', '', '', ''),
('2929', 'Justin Bieber', '420000', '', '', '02/12/2020', '', '', '', ''),
('63582', 'Karch Kiraly', '250', '08:45', '17:30', '05/10/2020', 'karch.kiraly@example.com', '47', 'USA', ''),
('1818', 'Karim Benzema', '765432', '', '', '20/05/2023', '', '', '', ''),
('3535', 'Katy Perry', '430000', '', '', '15/08/2021', '', '', '', ''),
('65724', 'Ken Griffey Jr.', '234', '13:30', '22:45', '06/30/2021', 'ken.griffey@example.com', '50', 'USA', ''),
('99673', 'Kerri Walsh Jennings', '987', '11:00', '20:00', '02/05/2021', 'kerri.walsh@example.com', '43', 'USA', ''),
('6006', 'Kevin De Bruyne', '234567', '', '', '30/06/2021', '', '', '', ''),
('4004', 'Kylian Mbappé', '987654', '', '', '05/02/2021', '', '', '', ''),
('3232', 'Lady Gaga', '470000', '', '', '10/04/2021', '', '', '', ''),
('1001', 'Lionel Messi', '250545', '', '', '10/05/2020', '', '', '', ''),
('1616', 'Luis Suárez', '543210', '', '', '25/01/2023', '', '', '', ''),
('1111', 'Luka Modrić', '890123', '', '', '28/03/2022', '', '', '', ''),
('2121', 'Manuel Neuer', '543210', '', '', '28/11/2023', '', '', '', ''),
('22435', 'Masahiro Tanaka', '567', '15:30', '00:00', '10/25/2021', 'masahiro.tanaka@example.com', '33', 'Japan', ''),
('23897', 'Mike Trout', '678', '16:45', '01:30', '12/05/2021', 'mike.trout@example.com', '30', 'USA', ''),
('71935', 'Misty May-Treanor', '345', '09:15', '18:00', '09/15/2020', 'misty.maytreanor@example.com', '43', 'USA', ''),
('8008', 'Mohamed Salah', '567890', '', '', '25/10/2021', '', '', '', ''),
('29517', 'Murilo Endres', '234', '13:30', '22:45', '06/30/2021', 'murilo.endres@example.com', '47', 'Brazil', ''),
('82714', 'Nalbert', '345', '09:15', '18:00', '09/15/2020', 'nalbert@example.com', '43', 'Brazil', ''),
('3003', 'Neymar Jr.', '123456', '', '', '20/12/2020', '', '', '', ''),
('33426', 'Nicole Branagh', '456', '14:45', '23:15', '08/12/2021', 'nicole.branagh@example.com', '42', 'USA', ''),
('31589', 'Nolan Ryan', '789', '17:30', '02:45', '01/15/2022', 'nolan.ryan@example.com', '57', 'USA', ''),
('1313', 'Paul Pogba', '210987', '', '', '20/07/2022', '', '', '', ''),
('86924', 'Phil Dalhausser', '123', '10:30', '19:00', '12/20/2020', 'phil.dalhausser@example.com', '41', 'USA', ''),
('4141', 'Post Malone', '430000', '', '', '28/04/2022', '', '', '', ''),
('4747', 'Post Malone', '420000', '', '', '09/01/2023', '', '', '', ''),
('1919', 'Raheem Sterling', '876543', '', '', '02/07/2023', '', '', '', ''),
('3030', 'Rihanna', '380000', '', '', '14/01/2021', '', '', '', ''),
('2323', 'Robert Firmino', '765432', '', '', '20/03/2024', '', '', '', ''),
('5005', 'Robert Lewandowski', '876543', '', '', '18/04/2021', '', '', '', ''),
('87432', 'Roberto Clemente', '456', '14:45', '23:15', '08/12/2021', 'roberto.clemente@example.com', '48', 'USA', ''),
('75431', 'Rodrigão', '789', '17:30', '02:45', '01/15/2022', 'rodrigao@example.com', '32', 'Brazil', ''),
('2020', 'Romelu Lukaku', '987654', '', '', '15/09/2023', '', '', '', ''),
('22186', 'Sadaharu Oh', '345', '09:15', '18:00', '09/15/2020', 'sadaharu.oh@example.com', '80', 'Japan', ''),
('9009', 'Sadio Mané', '678901', '', '', '05/12/2021', '', '', '', ''),
('3737', 'Selena Gomez', '410000', '', '', '09/11/2021', '', '', '', ''),
('92958', 'Serginho', '123', '10:30', '19:00', '12/20/2020', 'serginho@example.com', '41', 'Brazil', ''),
('7007', 'Sergio Ramos', '456789', '', '', '12/08/2021', '', '', '', ''),
('3636', 'Shawn Mendes', '370000', '', '', '27/09/2021', '', '', '', ''),
('4545', 'Shawn Mendes', '370000', '', '', '15/10/2022', '', '', '', ''),
('49083', 'Sho Nakata', '789', '17:30', '02:45', '01/15/2022', 'sho.nakata@example.com', '32', 'Japan', ''),
('94123', 'Shohei Ohtani', '234', '13:30', '22:45', '06/30/2021', 'shohei.ohtani@example.com', '27', 'Japan', ''),
('57296', 'Taylor Crabb', '678', '16:45', '01:30', '12/05/2021', 'taylor.crabb@example.com', '30', 'USA', ''),
('2828', 'Taylor Swift', '400000', '', '', '20/10/2020', '', '', '', ''),
('34892', 'Tetsuto Yamada', '678', '16:45', '01:30', '12/05/2021', 'tetsuto.yamada@example.com', '29', 'Japan', ''),
('3838', 'The Weeknd', '440000', '', '', '21/12/2021', '', '', '', ''),
('2424', 'Thiago Alcântara', '876543', '', '', '02/05/2024', '', '', '', ''),
('24680', 'Todd Rogers', '234', '13:30', '22:45', '06/30/2021', 'todd.rogers@example.com', '47', 'USA', ''),
('2222', 'Toni Kroos', '654321', '', '', '10/01/2024', '', '', '', ''),
('1010', 'Virgil van Dijk', '789012', '', '', '15/01/2022', '', '', '', ''),
('12903', 'Willie Mays', '123', '10:30', '19:00', '12/20/2020', 'willie.mays@example.com', '50', 'USA', ''),
('14892', 'Yu Darvish', '456', '14:45', '23:15', '08/12/2021', 'yu.darvish@example.com', '35', 'Japan', ''),
('05005', 'Δημήτρης Πέλκας', '', '', '', '18/04/2021', '', '', '', '6995678901'),
('02002', 'Κώστας Μήτρογλου', '', '', '', '15/09/2020', '', '', '', '6952345678'),
('07007', 'Κώστας Τσιμίκας', '', '', '', '12/08/2021', '', '', '', '6947890123'),
('01001', 'Κώστας Φορτούνης', '', '', '', '10/05/2020', '', '', '', '6941234567'),
('06009', 'Λάζαρος Λάμπρου', '', '', '', '30/06/2021', '', '', '', '6936789012'),
('04004', 'Πέτρος Μάνταλος', '', '', '', '05/02/2021', '', '', '', '6984567890'),
('03003', 'Σοφοκλής Σχορτσανίτης', '', '', '', '20/12/2020', '', '', '', '6973456789');