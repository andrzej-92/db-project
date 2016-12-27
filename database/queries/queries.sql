CREATE TABLE movies_category (
  id number(10, 0) NOT NULL,
  name varchar2(255) NOT NULL,
  CONSTRAINT movies_category_id_pk PRIMARY KEY (id)
)
CREATE TABLE movies (
  id number(10, 0) NOT NULL,
  category_id number(10, 0) NOT NULL,
  name  varchar2(255) NOT NULL,
  CONSTRAINT movies_category_id_fk FOREIGN KEY (category_id) REFERENCES movies_category (id),
  CONSTRAINT movies_id_pk PRIMARY KEY (id)
)
CREATE TABLE showing_types (
  id number(10, 0) NOT NULL,
  name varchar2(255) NOT NULL,
  CONSTRAINT showing_types_id_pk PRIMARY KEY (id)
)
CREATE TABLE showings (
  id number(10, 0) NOT NULL,
  type_id number(10, 0) NOT NULL,
  movie_id number(10, 0) NOT NULL,
  start_at  TIMESTAMP     NOT NULL,
  room_number number(10, 0) NOT NULL,
  CONSTRAINT showings_type_id_fk FOREIGN KEY (type_id) REFERENCES showing_types (id),
  CONSTRAINT showings_movie_id_fk FOREIGN KEY (movie_id) REFERENCES movies (id),
  CONSTRAINT showings_id_pk PRIMARY KEY (id)
)
CREATE TABLE payment_types (
  id number(10, 0) NOT NULL,
  name varchar2(255) NOT NULL,
  CONSTRAINT payment_types_id_pk PRIMARY KEY (id)
)
CREATE TABLE invoices (
  id number(10, 0) NOT NULL,
  "number" varchar2(255) NOT NULL,
  amount   number(8, 2)  NOT NULL,
  CONSTRAINT invoices_id_pk PRIMARY KEY (id)
)
CREATE TABLE states (
  id number(10, 0) NOT NULL,
  name varchar2(255) NOT NULL,
  CONSTRAINT states_id_pk PRIMARY KEY (id)
)
CREATE TABLE cities (
  id number(10, 0) NOT NULL,
  state_id number(10, 0) NOT NULL,
  name varchar2(255) NOT NULL,
  CONSTRAINT cities_state_id_fk FOREIGN KEY (state_id) REFERENCES states (id),
  CONSTRAINT cities_id_pk PRIMARY KEY (id)
)
CREATE TABLE cinemas (
  id  number(10, 0) NOT NULL,
  state_id number(10, 0) NOT NULL,
  name  varchar2(255) NOT NULL,
  CONSTRAINT cinemas_state_id_fk FOREIGN KEY (state_id) REFERENCES states (id),
  CONSTRAINT cinemas_id_pk PRIMARY KEY (id)
)
CREATE TABLE years (
  id  number(10, 0) NOT NULL,
  name varchar2(255) NOT NULL,
  CONSTRAINT years_id_pk PRIMARY KEY (id)
)
CREATE TABLE months (
  id number(10, 0) NOT NULL,
  year_id number(10, 0) NOT NULL,
  name varchar2(255) NOT NULL,
  CONSTRAINT months_year_id_fk FOREIGN KEY (year_id) REFERENCES years (id),
  CONSTRAINT months_id_pk PRIMARY KEY (id)
)
CREATE TABLE days (
  id number(10, 0) NOT NULL,
  month_id number(10, 0) NOT NULL,
  name varchar2(255) NOT NULL,
  CONSTRAINT days_month_id_fk FOREIGN KEY (month_id) REFERENCES months (id),
  CONSTRAINT days_id_pk PRIMARY KEY (id)
)
CREATE TABLE sales (
  id number(10, 0) NOT NULL,
  showing_id number(10, 0) NOT NULL,
  invoice_id number(10, 0) NOT NULL,
  day_id number(10, 0) NOT NULL,
  cinema_id number(10, 0) NOT NULL,
  payment_type_id number(10, 0) NOT NULL,
  netto_price number(8, 2)  NOT NULL,
  brutto_price number(8, 2)  NOT NULL,
  ticket_count number(10, 0) NOT NULL,
  CONSTRAINT sales_showing_id_fk FOREIGN KEY (showing_id) REFERENCES showings (id),
  CONSTRAINT sales_invoice_id_fk FOREIGN KEY (invoice_id) REFERENCES invoices (id),
  CONSTRAINT sales_day_id_fk FOREIGN KEY (day_id) REFERENCES days (id),
  CONSTRAINT sales_cinema_id_fk FOREIGN KEY (cinema_id) REFERENCES cinemas (id),
  CONSTRAINT sales_payment_type_id_fk FOREIGN KEY (payment_type_id) REFERENCES payment_types (id),
  CONSTRAINT sales_id_pk PRIMARY KEY (id)
)
