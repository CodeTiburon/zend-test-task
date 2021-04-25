CREATE EXTENSION IF NOT EXISTS "uuid-ossp";
CREATE EXTENSION IF NOT EXISTS "unaccent";
CREATE EXTENSION IF NOT EXISTS "pg_stat_statements";

CREATE TABLE IF NOT EXISTS public.users (
    id INT NOT NULL,
     community_id INT DEFAULT NULL,
      email VARCHAR(255) NOT NULL,
       password VARCHAR(128) NOT NULL,
        first_name VARCHAR(255) DEFAULT NULL,
         last_name VARCHAR(255) DEFAULT NULL,
          is_blocked BOOLEAN NOT NULL,
            company_name VARCHAR(255) DEFAULT NULL,
             business_unit VARCHAR(255) DEFAULT NULL,
             position VARCHAR(255) DEFAULT NULL, pass_restore_hash VARCHAR(64) DEFAULT NULL,
              pass_restore_hash_valid_until TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL,
              created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
              updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
              PRIMARY KEY(id)
                                 );