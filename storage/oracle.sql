CREATE TABLE movies_category (
  id   number(10, 0) NOT NULL,
  name varchar2(255) NOT NULL,
  CONSTRAINT movies_category_id_pk PRIMARY KEY (id)
)
CREATE TABLE movies (
  id          number(10, 0) NOT NULL,
  category_id number(10, 0) NOT NULL,
  name        varchar2(255) NOT NULL,
  CONSTRAINT movies_category_id_fk FOREIGN KEY (category_id) REFERENCES movies_category (id),
  CONSTRAINT movies_id_pk PRIMARY KEY (id)
)
CREATE TABLE showing_types (
  id   number(10, 0) NOT NULL,
  name varchar2(255) NOT NULL,
  CONSTRAINT showing_types_id_pk PRIMARY KEY (id)
)
CREATE TABLE showings (
  id          number(10, 0) NOT NULL,
  type_id     number(10, 0) NOT NULL,
  movie_id    number(10, 0) NOT NULL,
  start_at    DATE          NOT NULL,
  room_number number(10, 0) NOT NULL,
  CONSTRAINT showings_type_id_fk FOREIGN KEY (type_id) REFERENCES showing_types (id),
  CONSTRAINT showings_movie_id_fk FOREIGN KEY (movie_id) REFERENCES movies (id),
  CONSTRAINT showings_id_pk PRIMARY KEY (id)
)
CREATE TABLE payment_types (
  id   number(10, 0) NOT NULL,
  name varchar2(255) NOT NULL,
  CONSTRAINT payment_types_id_pk PRIMARY KEY (id)
)
CREATE TABLE states (
  id   number(10, 0) NOT NULL,
  name varchar2(255) NOT NULL,
  CONSTRAINT states_id_pk PRIMARY KEY (id)
)
CREATE TABLE cities (
  id       number(10, 0) NOT NULL,
  state_id number(10, 0) NOT NULL,
  name     varchar2(255) NOT NULL,
  CONSTRAINT cities_state_id_fk FOREIGN KEY (state_id) REFERENCES states (id),
  CONSTRAINT cities_id_pk PRIMARY KEY (id)
)
CREATE TABLE cinemas (
  id      number(10, 0) NOT NULL,
  city_id number(10, 0) NOT NULL,
  name    varchar2(255) NULL,
  address varchar2(255) NOT NULL,
  CONSTRAINT cinemas_city_id_fk FOREIGN KEY (city_id) REFERENCES cities (id),
  CONSTRAINT cinemas_id_pk PRIMARY KEY (id)
)
CREATE TABLE years (
  id   number(10, 0) NOT NULL,
  name varchar2(255) NOT NULL,
  CONSTRAINT years_id_pk PRIMARY KEY (id)
)
CREATE TABLE months (
  id      number(10, 0) NOT NULL,
  year_id number(10, 0) NOT NULL,
  name    varchar2(255) NOT NULL,
  CONSTRAINT months_year_id_fk FOREIGN KEY (year_id) REFERENCES years (id),
  CONSTRAINT months_id_pk PRIMARY KEY (id)
)
CREATE TABLE days (
  id       number(10, 0) NOT NULL,
  month_id number(10, 0) NOT NULL,
  name     varchar2(255) NOT NULL,
  CONSTRAINT days_month_id_fk FOREIGN KEY (month_id) REFERENCES months (id),
  CONSTRAINT days_id_pk PRIMARY KEY (id)
)
CREATE TABLE sales (
  id              number(10, 0) NOT NULL,
  showing_id      number(10, 0) NOT NULL,
  day_id          number(10, 0) NOT NULL,
  cinema_id       number(10, 0) NOT NULL,
  payment_type_id number(10, 0) NOT NULL,
  netto_price     number(8, 2)  NOT NULL,
  brutto_price    number(8, 2)  NOT NULL,
  ticket_count    number(10, 0) NOT NULL,
  CONSTRAINT sales_showing_id_fk FOREIGN KEY (showing_id) REFERENCES showings (id),
  CONSTRAINT sales_day_id_fk FOREIGN KEY (day_id) REFERENCES days (id),
  CONSTRAINT sales_cinema_id_fk FOREIGN KEY (cinema_id) REFERENCES cinemas (id),
  CONSTRAINT sales_payment_type_id_fk FOREIGN KEY (payment_type_id) REFERENCES payment_types (id),
  CONSTRAINT sales_id_pk PRIMARY KEY (id)
)
create table movies_category ( id number(10,0) not null, name varchar2(255) not null, constraint movies_category_id_pk primary key ( id ) )
create table movies ( id number(10,0) not null, category_id number(10,0) not null, name varchar2(255) not null, constraint movies_category_id_fk foreign key ( category_id ) references movies_category ( id ), constraint movies_id_pk primary key ( id ) )
create table showing_types ( id number(10,0) not null, name varchar2(255) not null, constraint showing_types_id_pk primary key ( id ) )
create table showings ( id number(10,0) not null, type_id number(10,0) not null, movie_id number(10,0) not null, start_at varchar2(255) not null, room_number number(10,0) not null, constraint showings_type_id_fk foreign key ( type_id ) references showing_types ( id ), constraint showings_movie_id_fk foreign key ( movie_id ) references movies ( id ), constraint showings_id_pk primary key ( id ) )
create table payment_types ( id number(10,0) not null, name varchar2(255) not null, constraint payment_types_id_pk primary key ( id ) )
create table states ( id number(10,0) not null, name varchar2(255) not null, constraint states_id_pk primary key ( id ) )
create table cities ( id number(10,0) not null, state_id number(10,0) not null, name varchar2(255) not null, constraint cities_state_id_fk foreign key ( state_id ) references states ( id ), constraint cities_id_pk primary key ( id ) )
create table cinemas ( id number(10,0) not null, city_id number(10,0) not null, name varchar2(255) null, address varchar2(255) not null, constraint cinemas_city_id_fk foreign key ( city_id ) references cities ( id ), constraint cinemas_id_pk primary key ( id ) )
create table years ( id number(10,0) not null, name varchar2(255) not null, constraint years_id_pk primary key ( id ) )
create table months ( id number(10,0) not null, year_id number(10,0) not null, name varchar2(255) not null, constraint months_year_id_fk foreign key ( year_id ) references years ( id ), constraint months_id_pk primary key ( id ) )
create table days ( id number(10,0) not null, month_id number(10,0) not null, name varchar2(255) not null, constraint days_month_id_fk foreign key ( month_id ) references months ( id ), constraint days_id_pk primary key ( id ) )
create table sales ( id number(10,0) not null, showing_id number(10,0) not null, day_id number(10,0) not null, cinema_id number(10,0) not null, payment_type_id number(10,0) not null, netto_price number(8, 2) not null, brutto_price number(8, 2) not null, ticket_count number(10,0) not null, constraint sales_showing_id_fk foreign key ( showing_id ) references showings ( id ), constraint sales_day_id_fk foreign key ( day_id ) references days ( id ), constraint sales_cinema_id_fk foreign key ( cinema_id ) references cinemas ( id ), constraint sales_payment_type_id_fk foreign key ( payment_type_id ) references payment_types ( id ), constraint sales_id_pk primary key ( id ) )
